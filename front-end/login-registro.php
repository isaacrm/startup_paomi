<?php
//creamos la sesion
error_reporting(E_ALL ^ E_NOTICE);
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(isset($_SESSION['id_cliente']))
{
    header('Location: index.php');
    exit();
}
?>
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
        <form  enctype="multipart/form-data" action="control/logueo.php" method="post" />

            <div class="hgroup title">
                <h3>Login</h3>
                <h5>Introduce los datos de tu cuenta</h5>
            </div>

            <div class="box-content">
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="login_email">Usuario</label>
                            <div class="controls">
                                <input class="span12" id="login_email" type="text" name="usuario" autocomplete="off" maxlength="15  value="" />
                            </div>
                        </div>
                    </div>

                    <div class="span6">	
                        <div class="control-group">					
                            <label class="control-label" for="login_password">Contraseña</label>
                            <div class="controls">
                                <input class="span12" id="login_password" type="password" name="contra" autocomplete="off" maxlength="15    " />
                            </div>
                        </div>
                    </div>
                </div>	
            </div>

            <div class="buttons">
                <div class="pull-left">
                    <button type="submit" class="btn btn-primary btn-small" name="login" value="Login">
                        Login
                    </button>
                    <a href="recuperar.php" class="btn btn-small">
                        Recuperar mi contraseña
                    </a>
                </div>
            </div>		

            <input type="hidden" name="redirect" value="/" />

        </form>		
    </div>
</div>
<!-- End class="login" -->                                
                            </div>
                            
                            <div class="span6">                                
                                <!-- Register -->
<div class="register">
    <div class="box">
        <div class="hgroup title">
            <h3>Eres nuevo? Registrate</h3>
            <h5>Si deseas realizar compras online, necesitas registrarte.</h5>
        </div>

        <div class="buttons">
            <div class="pull-left">
                <a href="#register" class="btn btn-small" data-toggle="modal">
                    Registrarte Ahora &nbsp; <i class="icon-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End class="register" --> </div>
                        </div>
                    </div>

                    <!-- Register modal window -->
<div id="register" class="modal hide fade" tabindex="-1">

    <form  enctype="multipart/form-data" action="control/registro.php" method="post" />

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="hgroup title">
                <h3>Registrarse</h3>
                <h5>Por favor, colocar datos reales, ya que de ello depende la calidad de servicio que le brindaremos, y la contraseña que le enviaremos al correo. Podrá cambiar la contraseña más adelante.</h5>
            </div>
        </div>

        <div class="modal-body">

            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="first_name">Nombres</label>
                        <div class="controls">
                            <input class="span12" type="text" id="first_name" name="nombre_cliente" value="" autocomplete="off" required/>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="last_name">Apellidos</label>
                        <div class="controls">
                            <input class="span12" type="text" id="last_name" name="apellido_cliente" value="" autocomplete="off" required/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="first_name">Fecha de Nacimiento</label>
                        <div class="controls">
                            <input class="span12" type="date" id="first_name" name="fecha_nacimiento"  autocomplete="off" value="" required/>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="last_name">DUI</label>
                        <div class="controls">
                            <input class="span12" type="text" id="last_name" name="dui" value=""autocomplete="off"  required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <label class="control-label" for="email">Domicilio</label>
                        <div class="controls">
                            <input class="span12" type="text" id="email" name="domicilio" value="" autocomplete="off" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <label class="control-label" for="email">Correo Electrónico</label>
                        <div class="controls">
                            <input class="span12" type="text" id="email" name="email" autocomplete="off" value="" required/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <label class="control-label" for="email">Nombre de Usuario</label>
                        <div class="controls">
                            <input class="span12" type="text" id="email" name="usuario" autocomplete="off" value="" required/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-small" name="signup" value="Register">
                Register now &nbsp; <i class="icon-ok"></i>
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