<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Usuarios</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
</head>
<body>
	<?php
		require_once("conexion.php");
		$db = conectaDB();
		$sql = $db->prepare("Select tipo_cliente, descripcion from tipo_cliente where id_tipo_cliente=".$_GET['id']);
		$sql->execute();
		$resultado = $sql->fetchAll(); 
		foreach ($resultado as $fila) {
			echo '
			<br><center><img src="images/logo.png" style="position:center; width:150px; height:150px; "></center>
					<center><h1 style="color:#222;">Modificar Tipos de Cliente</h1><a href="consulta_tcliente.php" class="btn btn-danger">Volver</a></center><br>
					<form action="mod_tcliente.php" method="POST" enctype="multipart/form-data" class="container">
					  <div class="form-group">
					    <label for="">Nombre</label>
					    <input type="text" class="form-control" name="nombre" value='.$fila['tipo_cliente'].'>
					  </div>
					  <div class="form-group">
					  	<label for="">descripcion</label>
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