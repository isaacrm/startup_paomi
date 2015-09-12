<?php
	require_once("conexion.php");
	$conexion = conectaDB();
	$sql = $conexion->prepare("update tipo_cliente set tipo_cliente='".$_POST['nombre']."', descripcion='".$_POST['desc']."' where id_tipo_cliente=".$_POST['ids']);
	$sql->execute();
	
	header("location: consulta_tcliente.php");
?>