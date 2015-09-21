<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario']))
{
    header('Location: login-registro.php');
    exit();
}
?>
<?php
require_once("../conexion.php");
$conexion = conectaDB(); //establecer conexion en base de datos
if(!empty($_POST)) {
    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmar = $_POST['confirmar'];

    $sql = $conexion->prepare("select contrasena_cliente from clientes where nombre_usuario='".$_SESSION['usuario'] ."'" );
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $filas) {
        $contra = $filas['contrasena_cliente'];
    }
        if (ctype_space($actual) || ctype_space($nueva) || ctype_space($confirmar)) {
            echo "<script>
			alert('No se puede dejar datos en blanco');
			window.location.href='../misdatos.php';
		</script>";
        }else if (md5($actual)!=$contra) {
            echo "<script>
			alert('Esa no es su contrasena actual');
			window.location.href='../misdatos.php';
		</script>";
        }else if ($nueva != $confirmar) {
            echo "<script>
			alert('Las nuevas contrasenas no coinciden');
			window.location.href='../misdatos.php';
		</script>";
        }
        else if (!preg_match('/^.*(?=.{4,15})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/', $nueva)) {
            echo "<script>
			alert('La contrasena nueva debe tener una minuscula, una mayuscula , un numero y debe de ser de 4 a 15 caracteres');
			window.location.href='../misdatos.php';
		</script>";
        }
        else{
            // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
            $sql = $conexion->prepare("update clientes set  contrasena_cliente='" . md5($nueva). "' where nombre_usuario='" .$_SESSION['usuario']."'" );
            $sql->execute();
            header("Location: ../misdatos.php");
        }

}

?>