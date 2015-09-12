<?php
	require_once("conexion.php");
	$conexion = conectaDB();
	$sql = $conexion->prepare("delete from tipo_productos where id_tipo_producto=".$_GET['id']);
	if($sql->execute() > 0)
	{
		header("location: consulta_tproducto.php");
	}
?>