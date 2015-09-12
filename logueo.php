<?php
	session_start();
	require_once('back-end/conexion.php');//archivo maestro conexion
	$conexion = conectaDB();//conexion con base de datos
	$usuario = $_POST['usuario']; //obtengo el dui del usuario
	//consulta para obtner datos especificos y iniciar sesion
	#Obtenemos el id de la persona, para hacer la comprobacion 
	$cc =  md5($_POST['contra']);
	$sql_query = $conexion->prepare('SELECT id_empleado FROM empleados WHERE usuario_empleado = ? AND contra_empleado = ?');
	$sql_query->bindParam(1, $usuario);
	$sql_query->bindParam(2, $cc);
	$sql_query->execute();
	$resultado = $sql_query->fetchAll();
	foreach ($resultado as $key) {
		$_SESSION['id'] = $key['id_empleado'];
		$_SESSION['usuario'] = $usuario;
	}
	if(isset($_SESSION['id'])){
		header("location: back-end/index.php");
	}
	else
	{
		echo "<script>
			alert('Datos erroneos');
		</script>";
	}
?>

