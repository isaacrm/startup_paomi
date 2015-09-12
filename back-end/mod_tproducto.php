<?php
	require_once("conexion.php");
	$conexion = conectaDB();
	$sql = $conexion->prepare("update tipo_productos set tipo_producto='".$_POST['nombre']."', descripcion='".$_POST['desc']."' where id_tipo_producto=".$_POST['ids']);
	$sql->execute();
	
	header("location: consulta_tproducto.php");
?>