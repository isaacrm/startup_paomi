<?php
	require_once("conexion.php");
	$conexion = conectaDB();
	$sql = $conexion->prepare("update productos set nombre_producto='".$_POST['producto']."', precio='".$_POST['precio']."', marca_producto='".$_POST['marca']."' where id_producto=".$_POST['ids']);
	$sql->execute();
	
	header("location: consulta_producto.php");
?>