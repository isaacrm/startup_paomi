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
    $sql = $conexion->prepare("update tipo_cliente set tipo_cliente='" . $_POST['nombre'] . "', descripcion='" . $_POST['desc'] . "' where id_tipo_cliente=" . $_POST['ids']);
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
                Tipos de Clientes
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
                <?php
                $db = conectaDB();
                $sql = $db->prepare("Select tipo_cliente, descripcion from tipo_cliente where id_tipo_cliente=".$_GET['id']);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $fila) {
                    echo '
					<form action="#" method="POST" enctype="multipart/form-data" class="container">
					  <div class="form-group">
					    <label for="">Nombre</label>
					    <input type="text" class="form-control" name="nombre" value='.$fila['tipo_cliente'].'>
					  </div>
					  <div class="form-group">
					  	<label for="">descripcion</label>
					    <textarea class="form-control" name="desc" rows="3">'.$fila['descripcion'].'</textarea>
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