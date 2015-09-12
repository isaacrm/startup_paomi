<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: ../../control/Login.php');
    exit();
}
?>
<?php include '../../maestros/cabecera.php' ?>
<?php include '../../maestros/sidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><center>
                BIENVENIDO AL SITIO ADMINISTRATIVO DE SHEER
            </h1></center>
        </section>

        <!-- Main content -->
        <section class="content">
            <img class="img-responsive" src="../../images/logo.png" style="position:center; width:auto; height:auto; ">
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>