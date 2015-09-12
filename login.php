<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" href="back-end/bootstrap/bootstrap.css">
	</head>
	<body class="cuerpo_login">
		<div class="container">
			<div class="espaciador"></div>
			<div class="col-md-11">
				<div class="col-md-4"></div>
				<div class="col-md-4" id="login">
					<form class="form-signin" role="form" method="POST" action="logueo.php">
						<div class="head-log">
							<center><p><img src="back-end/images/logo.png" height="200" width="200"></p>
							<h3 class="log-h3">Sheer Fashion</h3>
							</center><hr>
						</div>
						<br>
						<input name="usuario" type="text" class="form-control" placeholder="Usuario">
						<br>
						<input name="contra" type="password" class="form-control" placeholder="Contraseña">
						<br>
						<input class="btn btn-default" type="submit" value="Iniciar Sesión">
						<br>
					</form>
					<br><br>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<script src="back-end/js/jquery.js"></script>
	</body>
</html>