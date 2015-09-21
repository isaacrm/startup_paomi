<?php
error_reporting(E_ALL ^ E_NOTICE);
//creamos la sesion
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
                            <img src="img/logo.png" alt="Sheer" />
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End class="bottom" -->
<!-- End class="header" -->
<?php include('maestros/menu.php')?>


            <!-- Content section -->		
            <section class="main">
                
                <!-- Reset password -->
                <section class="reset_password">


                    <div class="container">
                        <div class="row">
                            <div class="span6 offset3">
                                <form  enctype="multipart/form-data" action="control/recuperar.php" method="post" />

                                    <div class="box">
                                        <div class="hgroup title">
                                            <h3>Olvidaste tu contraseña?</h3>
                                            <h5>No te preocupes, tiene solución. Solo necesitas recordar tu correo.</h5>
                                        </div>

                                        <div class="box-content">

                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="control-group">
                                                        <label class="control-label" for="email">Correo Electrónico</label>
                                                        <div class="controls">
                                                            <input class="span12" type="text" id="email" name="correo" value="" autocomplete="off" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-primary btn-small" type="submit" name="password_restore" value="Submit">
                                                Recuperar contraseña
                                            </button>                                            
                                        </div>
                                    </div>
                                </form>		
                            </div>
                        </div>
                    </div>	
                </section>                
                <!-- End Reset password -->
                
            </section>
            <!-- End class="main" -->



<?php include('maestros/footer.php') ?></html>