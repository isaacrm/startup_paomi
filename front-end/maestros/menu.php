<?php
session_start();
if(!isset($_SESSION['id_cliente'])){
    echo '
<!-- Navigation -->
<nav class="navigation">
    <div class="container">
        <div class="row">
            <div class="span9">
                <div class="hidden-phone">
                    <!-- Main menu (desktop) -->
                    <ul class="main-menu">
                        <li>
                            <a href="index.php" title="Home" class="title">Inicio</a>
                        </li>
                        <li>
                            <a href="productos.php" title="Productos" class="title">Productos</a>

                        </li>
                        <li>
                            <a href="frecuentes.php" title="Preguntas Frecuentes" class="title">Preguntas Frecuentes</a>
                        </li>

                        <li>
                            <a href="creadoras.php" title="Creadoras" class="title">Creadoras</a>
                        </li>
                        <li>
                            <a href="contactanos.php" title="Contactanos" class="title">Contactanos</a>
                        </li>
                    </ul>
                    <!-- End class="main-menu" -->
                </div>

                <div class="visible-phone">
                    <!-- Main menu (mobile) -->
                    <select class="mobile-nav">
                        <option value="" selected="selected" />Ir a&hellip;
                        <option value="index.php" />Inicio
                        <option value="productos.php" />Productos
                        <option value="frecuentes.php" />Preguntas Frecuentes
                        <option value="creadoras.php" />Creadoras
                        <option value="contactanos.html" />Contactanos
                    </select>
                </div>
            </div>

            <div class="span3 visible-desktop">
            </div>
        </div>
    </div>
</nav>
<!-- End class="navigation" -->
';
    }
else{
    echo '
<!-- Navigation -->
<nav class="navigation">
    <div class="container">
        <div class="row">
            <div class="span9">
                <div class="hidden-phone">
                    <!-- Main menu (desktop) -->
                    <ul class="main-menu">
                        <li>
                            <a href="index.php" title="Home" class="title">Inicio</a>
                        </li>
                        <li>
                            <a href="productos.php" title="Productos" class="title">Productos</a>

                        </li>
                        <li>
                            <a href="frecuentes.php" title="Preguntas Frecuentes" class="title">Preguntas Frecuentes</a>
                        </li>

                        <li>
                            <a href="creadoras.php" title="Creadoras" class="title">Creadoras</a>
                        </li>
                        <li>
                            <a href="contactanos.php" title="Contactanos" class="title">Contactanos</a>
                        </li>
                        <li>
                            <a href="misdatos.php" title="Perfil" class="title">Perfil</a>
                        </li>
                        <li>
                            <a href="control/cerrarcesion.php" title="Cerrar Sesión" class="title">Cerrar Sesion</a>
                        </li>

                    </ul>
                    <!-- End class="main-menu" -->
                </div>

                <div class="visible-phone">
                    <!-- Main menu (mobile) -->
                    <select class="mobile-nav">
                        <option value="" selected="selected" />Ir a&hellip;
                        <option value="index.php" />Inicio
                        <option value="productos.php" />Productos
                        <option value="frecuentes.php" />Preguntas Frecuentes
                        <option value="creadoras.php" />Creadoras
                        <option value="contactanos.html" />Contactanos
                        <option value="control/cerrarcesion.php" />Cerrar Sesion
                    </select>
                </div>
            </div>

            <div class="span3 visible-desktop">
            </div>
        </div>
    </div>
</nav>
<!-- End class="navigation" -->
';
}
?>