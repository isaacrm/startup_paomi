<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: ../../control/Login.php');
    exit();
}
?>
<?php
require_once("../../conexion.php");
if(!empty($_POST)) {
	$conexion = conectaDB();
	if ($_FILES['archivo']['name'] == "") {
		$url = "imagenes/img_membresia/" . strip_tags($_POST['nombre']) . ".jpg";
		$sql = $conexion->prepare("update tipo_membresia set nombre='" . strip_tags($_POST['nombre']) ."', imagen='" . $url . "', beneficios='" . strip_tags($_POST['desc']) . "', duracion='" . $_POST['duracion'] . "' where id_tipo_cliente=" . $_POST['ids']);
		$sql->execute();
		rename(strip_tags($_POST['imagen']),"../../../imagenes/img_membresia/". strip_tags($_POST['nombre']) . ".jpg" ) ;
		header("Location: ver.php");
	} else {

		$nombre = $_FILES['archivo']['name'];
		$nombre_tmp = $_FILES['archivo']['tmp_name'];
		$tipo = $_FILES['archivo']['type'];
		$tamano = $_FILES['archivo']['size'];

		$ext_permitidas = array('jpg', 'jpeg', 'gif', 'png');
		$partes_nombre = explode('.', $nombre);
		$extension = end($partes_nombre);
		$ext_correcta = in_array($extension, $ext_permitidas);
		$tipo_correcto = preg_match('/^image\/(jpg|jpeg|gif|png)$/', $tipo);
		$limite = 2048 * 1024;
		/*Toma el tamaño de la imagen subida*/
		$dimensiones = getimagesize($nombre_tmp);
		$ancho = $dimensiones[0];
		$alto = $dimensiones[1];
		/*Compara el tamaño con el que debe de ser*/
		if ($ancho == 1583 && $alto == 1384) {
			/*Compara el peso de la imagen, debe ser menor a 2 MB*/
			if ($tamano <= $limite) {
				if ($_FILES['archivo']['error'] > 0) {
					echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
				} else {
					echo 'Nombre: ' . $nombre . '<br/>';
					echo 'Tipo: ' . $tipo . '<br/>';
					echo 'Tamaño: ' . ($tamano / 1024) . ' Kb<br/>';
					echo 'Guardado en: ' . $nombre_tmp;
					move_uploaded_file($nombre_tmp, "../../../imagenes/img_membresia/" . strip_tags($_POST['nombre']) . ".jpg");
					$url = "imagenes/img_membresia/" . strip_tags($_POST['nombre']) . ".jpg";
					echo "<br/>Guardado en: " . "../../../imagenes//img_membresia/" . strip_tags($_POST['nombre']) . ".jpg";
					$sql = $conexion->prepare("update tipo_membresia set nombre='" . strip_tags($_POST['nombre']) . "', imagen='" . $url . "', beneficios='" . strip_tags($_POST['desc']) . "', duracion='" . $_POST['duracion'] . "' where id_tipo_cliente=" . $_POST['ids']);
					$sql->execute();

					header("location: ver.php");
				}
			}else {
				echo "<script type=\"text/javascript\">alert('La imagen pesa mas de 2 MB');</script>";
			}
		}
		else {
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
                <?php
                $db = conectaDB();
                $sql = $db->prepare("Select * from tipo_membresia where id_tipo_cliente=".$_GET['id']);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $fila) {
                    echo '
					<form action="#" method="POST" enctype="multipart/form-data" class="container">
					  <div class="form-group">
					    <label for="">Nombre</label>
					    <input type="text" class="form-control" name="nombre" value="'.$fila['nombre'].'">
					  </div>
					   <div class="form-group">
                            <input type="hidden" name="imagen" value="../../../'.$fila['imagen'].'"/>
                            <img id="imagen" src="../../../'.$fila['imagen'].'" border="0" width="150" height="200">
                            <input type="file" name="archivo" id="archivo" accept="image/png, image/jpeg, image/gif"/>
                        </div>
				<div class="form-group">
					<label for="">Duracion en meses</label>
					<select class="form-control" name="duracion" required>
					    <option value"'.$fila['duracion'].'>'.$fila['duracion'].'</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						</select>
				</div>
					  <div class="form-group">
					  	<label for="">Beneficios</label>
					    <textarea class="form-control" name="desc" rows="3">'.$fila['beneficios'].'</textarea>
					  </div>
					  <button type="submit" class="btn btn-danger">Modificar</button>
					   <a href="ver.php" class="btn btn-danger">Regresar</a>
					  <input value="'.$_GET['id'].'" type="hidden" name="ids">
					</form>
			';
                }
                ?>
                <div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>