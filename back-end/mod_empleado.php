<?php
	require_once("conexion.php");
	$conexion = conectaDB();
	$sql = $conexion->prepare("update clientes set nombres_empleado='".$_POST['nombre']."', apellidos_empleado='".$_POST['apellido']."', fecha_nacimiento='".$_POST['fecha']."', direccion_empleado='".$_POST['direccion']."', DUI_empleado='".$_POST['dui']."', usuario_empleado='".$_POST['usuario']."', correo_empleado='".$_POST['correo']."' where id_empleado=".$_POST['ids']);
	$sql->execute();
	
	header("location: consultar_empleados.php");
?>