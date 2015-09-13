<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: ../../control/Login.php');
    exit();
}
?>
<?php include '../../maestros/cabecera.php' ?>
<?php include 'buscar.php' ?>
<?php include '../../maestros/sidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Empleados
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <a href="ingresar.php" class="btn btn-primary">Nuevo</a>
            <a href="ver.php" class="btn btn-primary">Ver todos los registros</a>
            <table class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>DUI</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
                <?php
                if(!empty($_POST)) {
                require_once("../../conexion.php");
                $conexion = conectaDB();
                if  ( $_POST['filtro']==""){
                    echo '<p class="alert bg-danger">Ingrese un valor</p>';
                }
                else  if ( $_POST['filtro']!=""){
                require '../../libs/Zebra_Pagination.php';
                $sql = $conexion->prepare("select count(*) from empleados ");
                $sql->execute();
                $contador = $sql->fetchColumn(0);
                /*Numero de registros que se quiere por tabla*/
                $filas = 10;
                $paginacion = new Zebra_Pagination();
                $paginacion->records($contador);
                $paginacion->records_per_page($filas);
                $paginacion->padding(false);
                $sql = $conexion->prepare('select * from empleados where DUI_empleado LIKE "%' . $_POST['filtro'] . '%" LIMIT '. (($paginacion->get_page() - 1) * $filas) . ', ' . $filas);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $filas) {
                    echo '
		 				<tbody>
					        <tr>
					            <td>'.$filas['nombres_empleado'].'</td>
					            <td>'.$filas['apellidos_empleado'].'</td>
					            <td>'.$filas['direccion_empleado'].'</td>
					            <td>'.$filas['DUI_empleado'].'</td>
					            <td>'.$filas['usuario_empleado'].'</td>
					            <td>'.$filas['correo_empleado'].'</td>
					            <td><p><a href="modificar.php?id='.$filas['id_empleado'].'" class="btn btn-warning">Modificar</a> <a href="eliminar.php?id='.$filas['id_empleado'].'" class="btn btn-danger">Eliminar</a></p></td>
					        </tr>
					    </tbody>
		 			';
                }
                ?>
            </table>
            <?php $paginacion->render();?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ;}}?>
