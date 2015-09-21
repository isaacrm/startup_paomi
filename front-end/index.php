    <?php include('maestros/encabezado.php') ?>
    <!-- End class="top" -->

    <!-- Logo & Search bar -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="span8">							
                    <div class="logo">
                        <a href="#" title="&larr; Back home">
                            <img src="img/logo.png" alt="Sheer" />
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
                
                <!-- Home content -->
                <section class="home">
                    <!-- Slider -->
                    <section class="flexslider">
                        <ul class="slides">

                            <li>
                                <img src="img/slides/2.jpg" alt="" />
                                <div class="caption">
                                    <div class="container">
                                        <div class="span6">
                                            <h3>Descubre. Prueba. Disfruta.</h3>
                                            <br />
                                            <p>With masonry product listing &amp; blog</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </section>
                    <section class="static_page_1">


                        <div class="container">
                            <div class="row">
                                <div class="span12">
                                    <section class="static-page">
                                        <div class="row-fluid">

                                            <div class="span12">
                                                <div class="content">

                                                    <h1>Descubre . Prueba . Disfruta . Todo en un tu Sheer Box!</h1>
                                                    <p class="lead">Nos dedicamos al comercio de descubrimiento a traves del Box Retail a domicilio. Somos los pioneros en Centroamerica y nuestra vision es convertirnos en una empresa global. Nuestro concepto es una experiencia innovadora donde boista - nuestros clientes - se suscriben a nuestra comunidad para recibir todos los meses los mejores productos y las ultimas tendencias hasta la puerta de su casa u oficina. Creemos que la grandeza esta en los detalles por eso nos enfocamos en ofrecer un servicio personalizado, puntual y transparente. Vivimos nuestra marca con pasion y dedicacion. Y nuestra prioridad es exceder las expectativas de quienes viven la experiencia SHEER. TEAM SHEER</p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>


                    </section>
                    <!-- End class="flexslider" -->                    <!-- Promos -->
                    <section class="promos">
                        <div class="container">
                            <h2>Membresias</h2>
                            <div class="row">
                                <?php
                                require_once("conexion.php");
                                $conexion = conectaDB();
                                $sql = $conexion->prepare('select * from tipo_membresia  ');
                                $sql->execute();
                                $resultado = $sql->fetchAll();
                                foreach ($resultado as $filas) {
                                    echo '
                                    <div class="span4">
                                    <div class="free-shipping">
                                        <div class="box border-top">
                                            <img src="../'.$filas['imagen'].'" alt="'.$filas['id_tipo_cliente'].'"  width="100" height="100"/>
                                            <div class="hgroup title">
                                                <h3> '.$filas['nombre'].'</h3>
                                                <h4>DURACIÓN:  '.$filas['duracion'].'  Mes/es</h4>
                                            </div>
                                            <p><b>'.nl2br($filas['beneficios']).'</b></p>
                                        </div>
                                        </div>
                                    </div>
                                    ';
                                }
                                ?>
                                </div>
                            </div>

                    </section>
                    <!-- End class="promos" -->
                    <!-- End class="widget Text" -->
                                </div>
                            </div>	
                            
                        </div>
                    </section>
                </section>
                <!-- End class="home" -->
            </section>
            <!-- End class="main" -->
    <?php include('maestros/footer.php') ?>