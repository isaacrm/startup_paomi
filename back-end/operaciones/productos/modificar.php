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

    $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', marca_producto='" . $_POST['marca'] . "' where id_producto=" . $_POST['ids']);
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
                Productos
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
                <?php
                $db = conectaDB();
                $sql = $db->prepare("Select * from productos where id_producto=".$_GET['id']);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $fila) {
                    echo '
					<form action="#" method="POST" enctype="multipart/form-data" class="container">

					  <div class="form-group">
					   <label for="">Nombre Del Producto</label>
					    <input type="text" class="form-control" name="producto" value='.$fila['nombre_producto'].'>
					  </div>

					  <div class="form-group">
					    <label for="">Precio Del Producto</label>
					    <input type="text" class="form-control" name="precio" value='.$fila['precio'].'>
					  </div>

					  <div class="form-group">
					    <label for="">Marca Del Producto</label>
					    <input type="text" class="form-control" name="marca" value='.$fila['marca_producto'].'>
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