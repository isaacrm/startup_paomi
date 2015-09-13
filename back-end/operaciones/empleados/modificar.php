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
    $sql = $conexion->prepare("update empleados set nombres_empleado='" . $_POST['nombre'] . "', apellidos_empleado='" . $_POST['apellido'] . "', fecha_nacimiento='" . $_POST['fecha'] . "', direccion_empleado='" . $_POST['direccion'] . "', DUI_empleado='" . $_POST['dui'] . "', usuario_empleado='" . $_POST['usuario'] . "', correo_empleado='" . $_POST['correo'] . "' where id_empleado=" . $_POST['ids']);
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
            $sql = $db->prepare("Select * from empleados where id_empleado=".$_GET['id']);
            $sql->execute();
            $resultado = $sql->fetchAll();
            foreach ($resultado as $fila) {
                echo '
	<form action="#" method="POST" class="container">
	  <div class="form-group">
	    <label for="">Nombre</label>
	    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="'.$fila['nombres_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Apellido</label>
	    <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="'.$fila['apellidos_empleado'].' " required/>
	  </div>
	  <div class="form-group">
	    <label for="">Fecha de nacimiento</label>
	    <input type="date" class="form-control" name="fecha" value="'.$fila['fecha_nacimiento'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Direccion</label>
	    <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="'.$fila['direccion_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">DUI cliente</label>
	    <input type="text" class="form-control"  maxlength="10" name="dui" placeholder="DUI" value="'.$fila['DUI_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Usuario</label>
	    <input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario" value="'.$fila['usuario_empleado'].'" required/>
	  </div>
	  <div class="form-group">
	    <label for="">Correo</label>
	    <input type="email" class="form-control"  name="correo" placeholder="Correo" value="'.$fila['correo_empleado'].'" required/>
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
