<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cargos Empleados</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
</head>
<body>
    <br><br><center><img src="images/logo.png" style="position:center; width:150px; height:150px; "></center>
	<br><br> <center><h1 style="color:#222;">Cargos Empleados</h1><br><br><a href="index.php" class="btn btn-danger">Volver</a></center><br><br>
	<form action="ingresar_cargo.php" method="POST" class="container">
	  <div class="form-group">
	    <label  for="">Cargos empleado</label>
	   <input type="text" class="form-control" name="cargo" placeholder="Cargo" required>
	  </div>
	  <div class="form-group">
	  	<label>Descripcion</label>
	  	<textarea class="form-control" name="desc" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-danger">Ingresar</button>
	  <a href="consulta_cargo.php" class="btn btn-danger">Consultar</a>
	</form>
<script src="js/bootstrap.js"></script>
</body>
</html>