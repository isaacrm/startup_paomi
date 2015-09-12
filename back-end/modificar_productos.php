<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Productos</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
</head>
<body>
	<?php
		require_once("conexion.php");
		$db = conectaDB();
		$sql = $db->prepare("Select * from productos where id_producto=".$_GET['id']);
		$sql->execute();
		$resultado = $sql->fetchAll(); 
		foreach ($resultado as $fila) {
			echo '
			<br><center><img src="images/logo.png" style="position:center; width:150px; height:150px;"></center>

					<center><h1 style="color:#222;">Modificar Productos</h1>
					<a href="consulta_producto.php" class="btn btn-danger">Volver</a></center><br>
					<form action="mod_productos.php" method="POST" enctype="multipart/form-data" class="container">
					  
					  <div class="form-group">
					   <label for="">Nombre Del Producto</label>
					    <input type="text" class="form-control" name="producto" value='.$fila['nombre_producto'].'>
					  </div>

					  <div class="form-group">
					    <label for="">Precio Del Producto</label>
					    <input type="text" class="form-control" name="precio" value='.$fila['precio'].'>
					  </div>

					  <div class="form-group">
					    <label for="">Marca Del Producto</label>
					    <input type="text" class="form-control" name="marca" value='.$fila['marca_producto'].'>
					  </div>

					    <button type="submit" class="btn btn-danger">Modificar</button>
					  <input value="'.$_GET['id'].'" type="hidden" name="ids">
					</form>
			';
		}
	?>
	
	<script src="js/bootstrap.js"></script>
</body>
</html>