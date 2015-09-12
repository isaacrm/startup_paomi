<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: ../../control/Login.php');
	exit();
}
?>
<?php
require_once("../../conexion.php");
$conexion = conectaDB();
if(!empty($_POST)) {
	$sql = $conexion->prepare("update cargo_emp set nombre_cargo='" . $_POST['nombre'] . "', descripcion='" . $_POST['desc'] . "' where id_cargo =" . $_POST['ids']);
	$sql->execute();
	header("location: ver.php");
}
?>
<?php include '../../maestros/cabecera.php' ?>
<?php include '../../maestros/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Modificar Cargos
		</h1>
	</section>

	<section class="content">
		<div class="container" style="overflow-Y:scroll; height:300px; width:100%;">
		<?php
		$db = conectaDB();
		$sql = $db->prepare("Select nombre_cargo,descripcion from cargo_emp where id_cargo=".$_GET['id']);
		$sql->execute();
		$resultado = $sql->fetchAll();
		foreach ($resultado as $fila) {
			echo '
	<form action="#" method="POST" enctype="multipart/form-data" class="container">
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="nombre" value="' .$fila['nombre_cargo'].'">
		</div>
		<div class="form-group">
			<label for="">Descripcion</label>
			<textarea class="form-control" name="desc" rows="3">'.$fila['descripcion'].'</textarea>
		</div>
		<button type="submit" class="btn btn-danger">Modificar</button>
		<a href="ver.php" class="btn btn-danger">Regresar</a>
		<input value="'.$_GET['id'].'" type="hidden" name="ids">
	</form>
	';
		}
		?>
		<!-- Main content -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>

