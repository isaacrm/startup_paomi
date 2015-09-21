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
                
                <!-- Static page 1 -->
                <section class="static_page_1">


                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <section class="static-page">
                                    <div class="row-fluid">


                                        <div class="span12">
                                            <div class="content">
                                                <h1>Contactanos</h1>
                                                <p class="lead">Si tienes dudas, escríbenos</p>

                                                <hr />
                                                <h3>Mapa</h3>
                                                <div class="map" style="height: 320px; width: 100%; background-color: #F0F0F0;" data-address="Centro Comercial La Gran Vía, Antiguo Cuscatlán, La Libertad" data-zoom="12">&nbsp;</div>
                                                <hr />
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><em class="icon-map-marker icon-larger"></em> Sheer</h5>
                                                        <p>Centro Comercial La Gran Vía<br />Antiguo Cuscatlán<br />La libertad</p>
                                                    </div>
                                                    <div class="span4">
                                                        <h5><em class="icon-phone icon-larger"></em> Llamanos</h5>
                                                        <p>Si deseas hacer consultas telefónicas, no dudes en llamarnos<br /><strong>+503 2698 2654</strong></p>
                                                    </div>
                                                    <div class="span4">
                                                        <h5><em class="icon-medkit icon-larger"></em> Soporte</h5>
                                                        <p>Contamos con un equipo altamenta calificado para atender tus dudas</p>
                                                    </div>
                                                </div>
                                                <hr />

                                                <form id="form" enctype="multipart/form-data" action="#" method="post" />
                                                    
                                                    <h3>Envíanos un mensaje</h3>

                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <div class="control-group">
                                                                <label for="name" class="control-label">Nombre</label>
                                                                <div class="controls">
                                                                    <input type="text" name="name" id="name" value="" class="span12" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="span6">
                                                            <div class="control-group">
                                                                <label for="email" class="control-label">Email</label>
                                                                <div class="controls">
                                                                    <input type="text" name="email" id="email" value="" class="span12" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <div class="control-group">
                                                                <label for="subject" class="control-label">Titulo</label>
                                                                <div class="controls">
                                                                    <input type="text" name="subject" id="subject" value="" class="span12" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="span12">
                                                            <div class="control-group">
                                                                <label for="message" class="control-label">Mensaje</label>
                                                                <div class="controls">
                                                                    <textarea name="message" id="message" class="span12"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="span12">
                                                            <button class="btn btn-primary">
                                                                Enviar Mensaje
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>							
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>


                </section>    
                <!-- End Static page 1 -->
                
            </section>
            <!-- End class="main" -->


<?php include('maestros/footer.php') ?>