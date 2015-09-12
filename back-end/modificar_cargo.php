<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Cargos</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
</head>
<body>
	<?php
		require_once("conexion.php");
		$db = conectaDB();
		$sql = $db->prepare("Select * from cargo_emp where id_cargo =".$_GET['id']);
		$sql->execute();
		$resultado = $sql->fetchAll(); 
		foreach ($resultado as $fila) {
			echo '
			<br><center><img src="images/logo.png" style="position:center; width:150px; height:150px; "></center>
					<center><h1 style="color:#222;">Modificar Cargo</h1><a href="consulta_cargo.php" class="btn btn-danger">Volver</a></center><br>
					<form action="mod_cargo.php" method="POST" enctype="multipart/form-data" class="container">
					  <div class="form-group">
					    <label for="">Nombre</label>
					    <input type="text" class="form-control" name="nombre" value='.$fila['nombre_cargo'].'>
					  </div>
					  <div class="form-group">
					  	<label for="">Descripcion</label>
					    <textarea class="form-control" name="desc" rows="3">'.$fila['descripcion'].'</textarea>
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