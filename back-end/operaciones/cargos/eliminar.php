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
    $sql = $conexion->prepare("delete from cargo_emp where id_cargo=" . $_GET['id']);
    if ($sql->execute() > 0) {
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
                Eliminar Cargo
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method='POST'>
                <input type='hidden' name='id_noticia' value="<?php $_GET['id'] ?>" >
                <p class='alert bg-danger'>Borrar datos?</p>
                <div class='form-actions'>
                    <button type='submit' class='btn btn-danger'>Si</button>
                    <a class='btn btn btn-default' href='ver.php'>No</a>
                </div>
            </form>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>