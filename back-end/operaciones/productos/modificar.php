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
        if ($_FILES['archivo']['name'] == "") {
            $url = "imagenes/img_productos/" . strip_tags($_POST['producto']) . ".jpg";
            if ($_POST['tipo'] != "") {
                $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', id_tipo_producto='" . $_POST['tipo'] . "', descripcion='" . $_POST['desc'] ."', imagen='" . $url . "', inventario=inventario+'" . $_POST['existencia'] ."' where id_producto=" . $_POST['ids']);
                $sql->execute();
                rename(strip_tags($_POST['imagen']),"../../../imagenes/img_productos/". strip_tags($_POST['producto']) . ".jpg" ) ;
                header("location: ver.php");
            } else if ($_POST['marca'] != "") {
                $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', id_marca='" . $_POST['marca'] . "', descripcion='" . $_POST['desc'] ."', imagen='" . $url . "', inventario=inventario+'" . $_POST['existencia'] ."' where id_producto=" . $_POST['ids']);
                $sql->execute();
                rename(strip_tags($_POST['imagen']),"../../../imagenes/img_productos/". strip_tags($_POST['producto']) . ".jpg" ) ;
                header("location: ver.php");
            } else {
                $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', descripcion='" . $_POST['desc'] ."', imagen='" . $url ."', inventario=inventario+'" . $_POST['existencia'] . "' where id_producto=" . $_POST['ids']);
                $sql->execute();
                rename(strip_tags($_POST['imagen']),"../../../imagenes/img_productos/". strip_tags($_POST['producto']) . ".jpg" ) ;
                header("location: ver.php");
            }
        }
        else {

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
                        move_uploaded_file($nombre_tmp, "../../../imagenes/img_productos/" . strip_tags($_POST['producto']) . ".jpg");
                        $url = "imagenes/img_productos/" . strip_tags($_POST['producto']) . ".jpg";
                        echo "<br/>Guardado en: " . "../../../imagenes//img_productos/" . strip_tags($_POST['producto']) . ".jpg";
                        if ($_POST['tipo'] != "") {
                            $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', id_tipo_producto='" . $_POST['tipo'] . "', descripcion='" . $_POST['desc'] ."', imagen='" . $url . "' where id_producto=" . $_POST['ids']);
                            $sql->execute();
                            rename(strip_tags($_POST['imagen']),"../../../imagenes/img_productos/". strip_tags($_POST['producto']) . ".jpg" ) ;
                            header("location: ver.php");
                        } else if ($_POST['marca'] != "") {
                            $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', id_marca='" . $_POST['marca'] . "', descripcion='" . $_POST['desc'] ."', imagen='" . $url . "' where id_producto=" . $_POST['ids']);
                            $sql->execute();
                            rename(strip_tags($_POST['imagen']),"../../../imagenes/img_productos/". strip_tags($_POST['producto']) . ".jpg" ) ;
                            header("location: ver.php");
                        } else {
                            $sql = $conexion->prepare("update productos set nombre_producto='" . $_POST['producto'] . "', precio='" . $_POST['precio'] . "', descripcion='" . $_POST['desc'] ."', imagen='" . $url . "' where id_producto=" . $_POST['ids']);
                            $sql->execute();
                            rename(strip_tags($_POST['imagen']),"../../../imagenes/img_productos/". strip_tags($_POST['producto']) . ".jpg" ) ;
                            header("location: ver.php");
                        }
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
                    Productos
                </h1>
            </section>

            <!-- Main content -->
            <section class="content ">
                <div class="container " style="overflow-Y:scroll; height:auto; width:100%;">
                    <?php
                    $db = conectaDB();
                    $sql = $db->prepare("Select id_producto,nombre_producto, imagen, productos.descripcion, inventario, precio, nombre, tipo_producto from productos, marcas, tipo_productos where productos.id_marca=marcas.id_marca and productos.id_tipo_producto=tipo_productos.id_tipo_producto and id_producto=".$_GET['id']);
                    $sql->execute();
                    $resultado = $sql->fetchAll();
                    //Este es para el combobox de marcas
                    $db2 = conectaDB();
                    $sql2 = $db2->prepare("Select id_marca, nombre from marcas");
                    $sql2->execute();
                    $resultado2 = $sql2->fetchAll();
                    //Este es para el combobox de tipo de producto
                    $db3 = conectaDB();
                    $sql3 = $db3->prepare("Select id_tipo_producto, tipo_producto from tipo_productos ");
                    $sql3->execute();
                    $resultado3 = $sql3->fetchAll();
                    foreach ($resultado as $fila) {
                        echo '
                        <form action="#" method="POST" enctype="multipart/form-data" class="container col-md-12" >

                          <div class="form-group">
                           <label for="">Nombre Del Producto</label>
                            <input type="text" class="form-control" name="producto" value="'.$fila['nombre_producto'].'">
                          </div>
                          <div class="form-group">
                            <label for="">Precio Del Producto</label>
                            <input type="text" class="form-control" name="precio" value="'.$fila['precio'].'">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Marca Actual Del Producto</label>
                            <input type="text" class="form-control"  name="marcas" value="'.$fila['nombre'].'" readonly/>
                          </div>

                           <div class="form-group col-md-6">
                          <label for="">Cambiar marca del producto</label>
                          <select class="form-control" name="marca" >
                          <option value=""> </option>
                          ';
                        foreach ($resultado2 as $fila2) {
                            echo '
                          <option value=' . $fila2['id_marca'] . '>' . $fila2['nombre'] . '</option>
                          ';}
                            echo '
                          </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Tipo de Producto Actual</label>
                            <input type="text" class="form-control"  name="tipos" value="'.$fila['tipo_producto'].'" readonly/>
                          </div>
                           <div class="form-group col-md-6">
                          <label for="">Cambiar tipo del producto</label>
                          <select class="form-control" name="tipo" >
                          <option value=""> </option>
                          ';
                            foreach ($resultado3 as $fila3) {
                                echo '
                          <option value=' . $fila3['id_tipo_producto'] . '>' . $fila3['tipo_producto'] . '</option>
                          ';}
                             echo '
                          </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Existencias actuales</label>
                            <input type="text" class="form-control"  name="existencias" value="'.$fila['inventario'].'" readonly/>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Anadir existencias</label><br>
                            <input class="form-group col-md-12" type="number" id="num" name="existencia" value="1" min="1" max="200" />
                          </div>
                          <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" name="desc" rows="3">'.$fila['descripcion'].'</textarea>
                          </div>
                          <div class="form-group">
                                <input type="hidden" name="imagen" value="../../../'.$fila['imagen'].'"/>
                                <img id="imagen" src="../../../'.$fila['imagen'].'" border="0" width="150" height="200">
                                <input type="file" name="archivo" id="archivo" accept="image/png, image/jpeg, image/gif"/>
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