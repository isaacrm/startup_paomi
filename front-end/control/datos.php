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
$conexion = conectaDB();
if(!empty($_POST)) {
    $actual = $_POST['contra'];
    $sql = $conexion->prepare("select contrasena_cliente from clientes where nombre_usuario='" . $_SESSION['usuario'] . "'");
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $filas) {
        $contra = $filas['contrasena_cliente'];
    }
    if (ctype_space($actual)) {
        echo "<script>
			alert('No se puede dejar la contraseña');
			window.location.href='../misdatos.php';
		</script>";
    } else if (md5($actual) != $contra) {
        echo "<script>
			alert('Error en la contrasena. Esa no es su contrasena. Actualizacion de datos fallida.');
			window.location.href='../misdatos.php';
		</script>";
    } else {
        $sql = $conexion->prepare("update clientes set nombre_cliente='" . $_POST['nombre_cliente'] . "', apellidos_cliente='" . $_POST['apellido_cliente'] . "', fecha_nacimiento='" . $_POST['fecha_nacimiento'] . "', direccion_cliente='" . $_POST['domicilio'] . "', Dui_cliente='" . $_POST['dui'] . "', correo_cliente='" . $_POST['email'] . "' where nombre_usuario='" . $_SESSION['usuario'] . "'");
        $sql->execute();

        echo "<script>
			alert('Actualizacion de datos exitosa');
			window.location.href='../misdatos.php';
		</script>";
    }
}
?>