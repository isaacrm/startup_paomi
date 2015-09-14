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
	$nombre_membresia = strip_tags($_POST['tipo']);
	$desc = $_POST['desc'];
	$duracion = strip_tags($_POST['duracion']);
	$cantidad = 0;
	if ($_FILES['archivo']['name'] == "") {
		echo "<script type=\"text/javascript\">alert('Tienes que subir una imagen');</script>";
	} else {
		$nombre = $_FILES['archivo']['name'];
		$nombre_tmp = $_FILES['archivo']['tmp_name'];
		$tipo = $_FILES['archivo']['type'];
		$tamano = $_FILES['archivo']['size'];

		$ext_permitidas = array('jpg', 'jpeg', 'gif', 'png');
		$partes_nombre = explode('.', $nombre);
		$extension = end($partes_nombre);
		$ext_correcta = in_array($extension, $ext_permitidas);
		$tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $tipo);
		$limite = 2048 * 1024;
		/*Toma el tamaño de la imagen subida*/
		$dimensiones = getimagesize($nombre_tmp);
		$ancho = $dimensiones[0];
		$alto = $dimensiones[1];
		/*Compara el tamaño con el que debe de ser*/
		if ($ancho == 1583 && $alto == 1384) {
			/*Compara el peso de la imagen, debe ser menor a 2 MB  (Esto es mas codigo de validacion [extension y tipo])$ext_correcta && $tipo_correcto*/
			if ($tamano <= $limite) {
				if ($_FILES['archivo']['error'] > 0) {
					echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
				} else {
					echo 'Nombre: ' . $nombre . '<br/>';
					echo 'Tipo: ' . $tipo . '<br/>';
					echo 'Tamaño: ' . ($tamano / 1024) . ' Kb<br/>';
					echo 'Guardado en: ' . $nombre_tmp;

					if (file_exists('../../../../imagenes/img_membresia/' . $nombre)) {
						echo '<br/>El archivo ya existe: ' . $nombre;
					} else {
						move_uploaded_file($nombre_tmp, "../../../imagenes/img_membresia/" . $nombre_membresia . ".jpg");
						$url = "imagenes/img_membresia/" . $nombre_membresia . ".jpg";
						echo "<br/>Guardado en: " . "../../../imagenes//img_membresia/" . $nombre_membresia . ".jpg";

						$sql_query = $conexion->prepare("insert into tipo_membresia(nombre,imagen, beneficios, duracion, cantidad_miembros)values(?,?,?,?,?)");
						$sql_query->bindParam(1, $nombre_membresia);
						$sql_query->bindParam(2, $url);
						$sql_query->bindParam(3, $desc);
						$sql_query->bindParam(4, $duracion);
						$sql_query->bindParam(5, $cantidad);

						if ($sql_query->execute() > 0) {
							header("location: ver.php");
						}
					}
				}
			} else {
				echo "<script type=\"text/javascript\">alert('La imagen pesa mas de 2 MB');</script>";
			}
		} else {
			echo "<script type=\"text/javascript\">alert('La imagen debe ser exactamende de 1583px de alto x 1384px de ancho');</script>";
		}
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
			Tipos de Membresia
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
			<form action="#" method="post" class="form" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Nombre de Membresia</label>
					<input type="text" class="form-control" name="tipo" placeholder="Nombre de Membresia" autocomplete="off" required>
				</div>
				<div class='form-group'>
					<input type="file" name="archivo" id="archivo" accept="image/png, image/jpeg, image/gif"/>
				</div>
				<div class="form-group">
					<label for="">Duracion en meses</label>
					<select class="form-control" name="duracion" required>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						<option value='6'>6</option>
						<option value='7'>7</option>
						<option value='8'>8</option>
						<option value='9'>9</option>
						<option value='10'>10</option>
						<option value='11'>11</option>
						<option value='12'>12</option>
						</select>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="desc" rows="3"></textarea>
				</div>

				<button type="submit" class="btn btn-danger">Ingresar</button>
				<a href="ver.php" class="btn btn-danger">Regresar</a>
			</form>
			<div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>


