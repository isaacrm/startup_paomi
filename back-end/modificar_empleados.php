<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Empleados</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
</head>
<body>
	<?php
		require_once("conexion.php");
		$db = conectaDB();
		$sql = $db->prepare("Select * from empleados where id_empleado=".$_GET['id']);
		$sql->execute();
		$resultado = $sql->fetchAll(); 
		foreach ($resultado as $fila) {
			echo '
			<br><center><img src="images/logo.png" style="position:center; width:150px; height:150px; "></center>
	 <center><h1 style="color:#222;">Empleados</h1><br><a href="index.php" class="btn btn-success">Volver</a></center>
	<form action="mod_empleado.php" method="POST" class="container">
	  <div class="form-group">
	    <label for="">Nombre</label>
	    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="'.$fila['nombres_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Apellido</label>
	    <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="'.$fila['apellidos_empleado'].' " required/>
	  </div>
	  <div class="form-group">
	    <label for="">Fecha de nacimiento</label>
	    <input type="date" class="form-control" name="fecha" value="'.$fila['fecha_nacimiento'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Direccion</label>
	    <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="'.$fila['direccion_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">DUI cliente</label>
	    <input type="text" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" name="dui" placeholder="DUI" value="'.$fila['DUI_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Usuario</label>
	    <input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario" value="'.$fila['usuario_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Correo</label>
	    <input type="text" class="form-control"  name="correo" placeholder="Correo" value="'.$fila['correo_empleado'].'" required/>
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