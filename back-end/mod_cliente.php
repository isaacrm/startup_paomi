<?php
	require_once("conexion.php");
	$conexion = conectaDB();
	$sql = $conexion->prepare("update clientes set nombre_cliente='".$_POST['nombre']."', apellidos_cliente='".$_POST['apellido']."', fecha_nacimiento='".$_POST['fecha']."', direccion_cliente='".$_POST['direccion']."', Dui_cliente='".$_POST['dui']."', nombre_usuario='".$_POST['usuario']."', correo_cliente='".$_POST['correo']."' where id_cliente=".$_POST['ids']);
	$sql->execute();
	
	header("location: consulta_cliente.php");
?>