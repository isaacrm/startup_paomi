
<?php include('maestros/encabezado.php') ?>
<!-- Logo & Search bar -->
<div class="bottom">
    <div class="container">
        <div class="row">
            <div class="span8">
                <div class="logo">
                    <a href="/" title="&larr; Back home">
                        <img src="img/logo.png" alt="La Boutique" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End class="bottom" -->

</div>
<!-- End class="header" -->
<?php include('maestros/menu.php')?>


<!-- Content section -->
<section class="main">

    <!-- Login / Register -->
    <section class="login_register">


        <div class="container">
            <div class="row">
                <div class="span6">
                    <!-- Login -->
                    <div class="login">
                        <div class="box">
                            <div class="hgroup title">
                                <h3>Cambiar contrasena</h3>
                                <h5>Si deseas cambiar la contrasena, hazlo aca</h5>
                            </div>

                            <div class="buttons">
                                <div class="pull-left">
                                    <a href="#nuevacontra" class="btn btn-small" data-toggle="modal">
                                        Cambiar Contrasena &nbsp; <i class="icon-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End class="register" --> </div>
                    <!-- End class="login" -->


                <div class="span6">
                    <!-- Register -->
                    <div class="register">
                        <div class="box">
                            <div class="hgroup title">
                                <h3>Actualizar datos </h3>
                                <h5>Si deseas cambiar algun dato, ingresa aqui.</h5>
                            </div>

                            <div class="buttons">
                                <div class="pull-left">
                                    <a href="#register" class="btn btn-small" data-toggle="modal">
                                        Cambiar Datos &nbsp; <i class="icon-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End class="register" --> </div>
            </div>
        </div>
        <?php
        require_once("conexion.php");
        $conexion = conectaDB();
        $sql = $conexion->prepare("select * from clientes where nombre_usuario= '".$_SESSION['usuario'] ."'" );
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $filas) {
            echo '
        <!-- Register modal window -->
        <div id="register" class="modal hide fade" tabindex="-1">

            <form  enctype="multipart/form-data" action="control/datos.php" method="post" />

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="hgroup title">
                    <h3>Cambiar Datos</h3>
                    <h5>Ingrese datos reales para poder brindarle un servicio optimo. Debe ingresar la contraseña para modificar los datos</h5>
                </div>
            </div>

            <div class="modal-body">

                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="first_name">Nombres</label>
                            <div class="controls">
                                <input class="span12" type="text" id="first_name" name="nombre_cliente" value="'.$filas['nombre_cliente'].'" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="last_name">Apellidos</label>
                            <div class="controls">
                                <input class="span12" type="text" id="last_name" name="apellido_cliente" value="'.$filas['apellidos_cliente'].'" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="first_name">Fecha de Nacimiento</label>
                            <div class="controls">
                                <input class="span12" type="date" id="first_name" name="fecha_nacimiento"  autocomplete="off" value="'.$filas['fecha_nacimiento'].'" required/>
                            </div>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="last_name">DUI</label>
                            <div class="controls">
                                <input class="span12" type="text" id="last_name" name="dui" value="'.$filas['Dui_cliente'].'" autocomplete="off"  required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="email">Domicilio</label>
                            <div class="controls">
                                <input class="span12" type="text" id="email" name="domicilio" value="'.$filas['direccion_cliente'].'" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="email">Correo Electronico</label>
                            <div class="controls">
                                <input class="span12" type="text" id="email" name="email" autocomplete="off" value="'.$filas['correo_cliente'].'" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="email">Contrasena</label>
                            <div class="controls">
                                <input class="span12" type="password" id="email" name="contra" value="" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-small" name="signup" value="Register">
                    Actualizar mis datos &nbsp; <i class="icon-ok"></i>
                </button>
            </div>

            </form>
        </div>
         ';
        }
        ?>
        <!-- Register modal window -->
        <div id="nuevacontra" class="modal hide fade" tabindex="-1">

            <form  enctype="multipart/form-data" action="control/cambiarcontra.php" method="post" />

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="hgroup title">
                    <h3>Cambio de Contrasena</h3>
                    <h5> Procure colocar una contrasena que recuerde. Los cambios tendran efecto la proxima vez que inicie sesion</h5>
                </div>
            </div>

            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="email">Contrasena Actual</label>
                            <div class="controls">
                                <input class="span12" type="password" id="email" name="actual" value="" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="first_name">Nueva Contrasena</label>
                            <div class="controls">
                                <input class="span12" type="password" id="first_name" name="nueva" value="" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="last_name">Confirmar Nueva Contrasena</label>
                            <div class="controls">
                                <input class="span12" type="password" id="last_name" name="confirmar" value="" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-small" name="signup" value="Register">
                    Actualizar Contrasena &nbsp; <i class="icon-ok"></i>
                </button>
            </div>

            </form>
        </div>
        <!-- End Register modal window -->
    </section>
    <!-- End Login / Register -->

</section>
<!-- End class="main" -->
<?php include('maestros/footer.php') ?></html>


