<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: ../../control/Login.php');
	exit();
}
?>
<?php
require_once("../../conexion.php");
$conexion = conectaDB(); //establecer conexion en base de datos
if(!empty($_POST)) {
	$nombre = $_POST['cargo'];
	$desc = $_POST['desc'];
	$sql_query = $conexion->prepare("insert into cargo_emp (nombre_cargo, descripcion)values(?,?)");
	$sql_query->bindParam(1, $nombre);
	$sql_query->bindParam(2, $desc);
	if ($sql_query->execute() > 0) {
		header("location: ver.php");
	}
}
?>
<?php include '../../maestros/cabecera.php' ?>
<?php include '../../maestros/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Cargos de Empleados
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container" style="overflow-Y:scroll; height:300px; width:100%;">
		<form action="#" method="POST" class="container">
			<div class="form-group">
				<label  for="">Cargos empleado</label>
				<input type="text" class="form-control" name="cargo" placeholder="Cargo" required>
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<textarea class="form-control" name="desc" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-danger">Ingresar</button>
			<a href="ver.php" class="btn btn-danger">Regresar</a>
		</form>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>
