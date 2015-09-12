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
	$sql = $conexion->prepare("update clientes set nombre_cliente='" . $_POST['nombre'] . "', apellidos_cliente='" . $_POST['apellido'] . "', fecha_nacimiento='" . $_POST['fecha'] . "', direccion_cliente='" . $_POST['direccion'] . "', Dui_cliente='" . $_POST['dui'] . "', nombre_usuario='" . $_POST['usuario'] . "', correo_cliente='" . $_POST['correo'] . "' where id_cliente=" . $_POST['ids']);
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
			Modificar Clientes
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
<?php
$db = conectaDB();
$sql = $db->prepare("Select * from clientes where id_cliente=".$_GET['id']);
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $fila) {
	echo '
	<div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
	<form action="#" method="POST" class="container">
	  <div class="form-group">
	    <label for="">Nombre</label>
	    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="' . $fila['nombre_cliente'] . '" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Apellido</label>
	    <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="' . $fila['apellidos_cliente'] . ' " required/>
	  </div>
	  <div class="form-group">
	    <label for="">Fecha de nacimiento</label>
	    <input type="date" class="form-control" name="fecha" value="' . $fila['fecha_nacimiento'] . '" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Direccion</label>
	    <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="' . $fila['direccion_cliente'] . '" required/>
	  </div>
	  <div class="form-group">
	    <label for="">DUI cliente</label>
	    <input type="text" class="form-control"  maxlength="10" name="dui" placeholder="DUI" value="' . $fila['Dui_cliente'] . '" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Usuario</label>
	    <input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario" value="' . $fila['nombre_usuario'] . '" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Correo</label>
	    <input type="email" class="form-control"  name="correo" placeholder="Correo" value="' . $fila['correo_cliente'] . '" required/>
	  </div>
	  <button type="submit" class="btn btn-danger">Modificar</button>
	  <a href="ver.php" class="btn btn-danger">Regresar</a>
	  <input value="' . $_GET['id'] . '" type="hidden" name="ids">
	  </form>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

		';
		}
		?>
	<?php include '../../maestros/footer.php' ?>
