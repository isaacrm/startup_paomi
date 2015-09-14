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
    $sql = $conexion->prepare("delete from tipo_membresia where id_tipo_cliente=" . $_GET['id']);
    if ($sql->execute() > 0) {
        /*Esta pequeña linea de codigo elimina la imagen relacionada con el registro a eliminar*/
        unlink('../../../'.$_POST['imagen']);
        header("location: ver.php");
    } else {
        echo '<script type="text/javascript">
			alert("El campo esta relacionado");
		</script>';
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
                Eliminar Tipo de Membresia
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method='POST'>
                <?php
                $db = conectaDB();
                $sql = $db->prepare("Select imagen from tipo_membresia where id_tipo_cliente=" . $_GET['id']);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $fila) {
                    echo ' <input type="hidden" name="imagen" value="'.$fila['imagen'].'">';} ?>
                <input type='hidden' name='id_membresia' value="<?php $_GET['id'] ?>" >
                <p class='alert bg-danger'>Borrar datos?</p>
                <div class='form-actions'>
                    <button type='submit' class='btn btn-danger'>Si</button>
                    <a class='btn btn btn-default' href='ver.php'>No</a>
                </div>
            </form>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>