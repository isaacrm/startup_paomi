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
    $descripcion = $_POST['desc'];
    $existencias = $_POST['existencia'];
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

                    if (file_exists('../../../../imagenes/img_productos/' . $nombre)) {
                        echo '<br/>El archivo ya existe: ' . $nombre;
                    } else {
                        move_uploaded_file($nombre_tmp, "../../../imagenes/img_productos/" . $producto . ".jpg");
                        $url = "imagenes/img_productos/" . $producto . ".jpg";
                        echo "<br/>Guardado en: " . "../../../imagenes//img_productos/" . $producto . ".jpg";

                        $sql_query = $conexion->prepare("insert into productos(precio, nombre_producto, id_marca, id_tipo_producto, descripcion, inventario, imagen)values(?,?,?,?,?,?,?)");
                        $sql_query->bindParam(1, $precio);
                        $sql_query->bindParam(2, $producto);
                        $sql_query->bindParam(3, $marca);
                        $sql_query->bindParam(4, $tipo);
                        $sql_query->bindParam(5, $descripcion);
                        $sql_query->bindParam(6, $existencias);
                        $sql_query->bindParam(7, $url);
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
                Productos
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
                <form action="#" method="post" class="form" role="form" enctype="multipart/form-data">
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
                        <select class="form-control" name="marca" required>
                        <?php
                        $db = conectaDB();
                        $sql = $db->prepare("select id_marca, nombre from marcas");
                        $sql->execute();
                        $resultado = $sql->fetchAll();
                        foreach ($resultado as $fila) {
                            echo '
		  					 <option value='.$fila['id_marca'].'>'.$fila['nombre'].'</option>
		  				';
                        }
                        ?>
                        </select>
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
                    <div class="form-group">
                        <label for="">Existencias</label>
                        <input class="form-group " type="number" id="num" name="existencia" value="1" min="1" max="200" />
                    </div>
                    <div class="form-group">
                        <input type="file" name="archivo" id="archivo" accept="image/png, image/jpeg, image/gif"/>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion del Producto</label>
                        <textarea name="desc" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Ingresar</button>
                    <a href="ver.php" class="btn btn-danger">Regresar</a>
                </form>
                <div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>