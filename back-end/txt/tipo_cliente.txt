<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tipo Clientes</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
</head>
<body>
    <br><br><center><img src="images/logo.png" style="position:center; width:150px; height:150px; "></center>
	<br><br> <center><h1 style="color:#222;">Tipos de Clientes</h1><br><br><a href="index.php" class="btn btn-danger">Volver</a></center><br><br>
	<form action="ingresar_tipo.php" method="POST" class="container">
	  <div class="form-group">
	    <label for="">Tipo Cliente</label>
	    <input type="text" class="form-control" name="tipo" placeholder="Tipo Cliente" required>
	  </div>
	  <div class="form-group">
	  	<textarea class="form-control" name="desc" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-danger">Ingresar</button>
	  <a href="consulta_tcliente.php" class="btn btn-danger">Consultar</a>
	</form>
<script src="js/bootstrap.js"></script>
</body>
</html>
