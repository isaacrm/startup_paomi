<?php
session_start();
require_once('../conexion.php');//archivo maestro conexion
$conexion = conectaDB();//conexion con base de datos
$usuario = $_POST['usuario']; //obtengo el dui del usuario
//consulta para obtner datos especificos y iniciar sesion
#Obtenemos el id de la persona, para hacer la comprobacion
$cc =  md5($_POST['contra']);
$sql_query = $conexion->prepare('SELECT id_cliente, id_tipo_cliente FROM clientes WHERE nombre_usuario = ? AND contrasena_cliente = ?');
$sql_query->bindParam(1, $usuario);
$sql_query->bindParam(2, $cc);
$sql_query->execute();
$resultado = $sql_query->fetchAll();
foreach ($resultado as $key) {
    $_SESSION['id_cliente'] = $key['id_cliente'];
    $_SESSION['usuario'] = $usuario;
}
if(isset($_SESSION['id_cliente'])){
    header("location: ../productos.php");
}
else
{
    echo "<script>
			alert('Datos erroneos');
			window.location.href='../login-registro.php';
		</script>";
}
?>

