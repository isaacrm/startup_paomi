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
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $sql_query = $conexion->prepare("insert into productos(precio, nombre_producto, marca_producto, id_tipo_producto)values(?,?,?,?)");
    $sql_query->bindParam(1, $precio);
    $sql_query->bindParam(2, $producto);
    $sql_query->bindParam(3, $marca);
    $sql_query->bindParam(4, $tipo);
    if ($sql_query->execute() > 0) {
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
                Productos
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
                <form action="#" method="POST" class="container">
                    <div class="form-group">
                        <label for="">Nombre Producto</label>
                        <input type="text" class="form-control" name="producto" placeholder="Producto" required>
                    </div>
                    <div class="form-group">
                        <label for="">Precio Producto</label>
                        <input type="text" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57 || event.keyCode == 250) event.returnValue = false;" name="precio" placeholder="Precio" required>
                    </div>
                    <div class="form-group">
                        <label for="">Marca Producto</label>
                        <input type="text" class="form-control" name="marca" placeholder="Marca" required >
                    </div>
                    <div class="form-group">
                        <label for="">Tipos Productos</label>
                        <select class="form-control" name="tipo" required>
                            <?php
                            $db = conectaDB();
                            $sql = $db->prepare("select id_tipo_producto, tipo_producto from tipo_productos");
                            $sql->execute();
                            $resultado = $sql->fetchAll();
                            foreach ($resultado as $fila) {
                                echo '
		  					 <option value='.$fila['id_tipo_producto'].'>'.$fila['tipo_producto'].'</option>
		  				';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Ingresar</button>
                    <a href="ver.php" class="btn btn-danger">Regresar</a>
                </form>
                <div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>