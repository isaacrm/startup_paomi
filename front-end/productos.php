<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if(!isset($_SESSION['id_cliente'])){
    header('Location: login-registro.php');
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
                        <a href="index.php" title="&larr; Back home">
                            <img src="img/logo.png" alt="Sheer" />
                        </a>
                    </div>
                </div>
                <?php include('maestros/buscar-tienda.php')?>

            </div>
        </div>
    </div>
    <!-- End class="bottom" -->
    
</div>
<!-- End class="header" -->
<?php include('maestros/menu.php')?>

            <!-- Content section -->		
            <section class="main">
                
                <!-- Category content -->
                <section class="category">

                    <div class="container">
                        <div class="row">

                            <div class="span3">
                                
                                <!-- Sidebar -->
                                <aside class="sidebar">

                                    <div class="children">
                                        <div class="box border-top">

                                            <div class="hgroup title">
                                                <h3>
                                                    <a href="productos.php" title="Womens">Womens</a>
                                                </h3>
                                            </div>

                                            <ul class="category-list secondary">
                                                <li>
                                                    <a href="productos.php" title="Shoes">
                                                        <span class="count">3</span>
                                                        Shoes				
                                                    </a>
                                                </li>
                                                <li class="current">
                                                    <a href="productos.php" title="Dresses">
                                                        <span class="count">11</span>
                                                        Dresses				
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="productos.php" title="Bags">
                                                        <span class="count">2</span>
                                                        Bags				
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="productos.php" title="Trousers">
                                                        <span class="count">7</span>
                                                        Trousers				
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="productos.php" title="Tops">
                                                        <span class="count">8</span>
                                                        Tops				
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="productos.php" title="Accessories">
                                                        <span class="count">4</span>
                                                        Accessories				
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Price filter -->
                                    <div class="price-filter">
                                        <div class="box border-top">
                                            <div class="hgroup title">
                                                <h3>Refine products</h3>
                                                <h5>Filter your products by price</h5>
                                            </div>

                                            <div id="slider" data-max="200" data-step="5" data-currency="&pound;"> </div>
                                            <span id="slider-label">Price range: <strong>£0 &ndash; £200</strong></span>
                                        </div>
                                    </div>
                                    <!-- End class="price-filter" -->


                                    <!-- Latest reviews -->
                                    <div class="widget LatestProductReviews">
                                        <h3 class="widget-title widget-title ">Latest product reviews</h3>
                                        <ul class="ratings-small">
                                            <li>
                                                <div class="image">
                                                    <a title="View product" href="product.html">
                                                        <img class="gravatar" src="img/thumbnails/avatar.png" alt="" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>Ebay seller</h6>
                                                    <small>08/30/2013</small>
                                                    <div class="rating rating-3">
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <a title="View product" href="product.html">
                                                        <img class="gravatar" src="img/thumbnails/avatar.png" alt="" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>Victoria Spince</h6>
                                                    <small>08/30/2013</small>
                                                    <div class="rating rating-1">
                                                         <i class="icon-heart"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <a title="View product" href="product.html">
                                                        <img class="gravatar" src="img/thumbnails/avatar.png" alt="" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>Becca</h6>
                                                    <small>08/30/2013</small>
                                                    <div class="rating rating-4">
                                                         <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                    </div>
                                                </div>
                                            </li>                                            
                                        </ul>
                                    </div>
                                    <!-- end class="widget LatestProductReviews" -->
                                    
                                    <!-- Latest Products -->
                                    <div class="widget LatestProducts">
                                        <h3 class="widget-title widget-title ">What's new</h3>
                                        <ul class="product-list-small">
                                            <li>			
                                                <div class="image">
                                                    <a href="product.html" title="Lolita">
                                                        <img src="img/thumbnails/db_file_img_269_160xauto.jpg" alt="Lolita" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>
                                                        <a href="product.html" title="Lolita">Lolita</a>
                                                    </h6>

                                                    <div class="price">
                                                        £88.00										
                                                    </div>

                                                    <div class="rating rating-4">
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>			
                                                <div class="image">
                                                    <a href="product.html" title="Mars">
                                                        <img src="img/thumbnails/db_file_img_265_160xauto.jpg" alt="Mars" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>
                                                        <a href="product.html" title="Mars">Mars</a>
                                                    </h6>

                                                    <div class="price">
                                                        £398.00										
                                                    </div>

                                                    <div class="rating rating-0">
                                                        <a href="#">No reviews &mdash; be the first?</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>			
                                                <div class="image">
                                                    <a href="product.html" title="Anna Lace">
                                                        <img src="img/thumbnails/db_file_img_261_160xauto.jpg" alt="Anna Lace" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>
                                                        <a href="product.html" title="Anna Lace">Anna Lace</a>
                                                    </h6>

                                                    <div class="price">
                                                        £38.00										
                                                    </div>

                                                    <div class="rating rating-4">
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                    </div>
                                                </div>
                                            </li>                                            
                                        </ul>
                                    </div>
                                    <!-- End class="widget LatestProducts" -->
                                    
                                    <!-- Adverts -->
                                    <div class="widget Partial">
                                        <h3 class="widget-title widget-title ">New for Summer 2014</h3>
                                        <ul class="adverts">
                                            <li>
                                                <a href="#" class="advert">
                                                    <img src="img/adverts/advert-1.jpg" alt="" />
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="advert">
                                                    <img src="img/adverts/advert-2.jpg" alt="" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End class="widget Partial" -->
                                    
                                    <!-- Products on Sale -->
                                    <div class="widget Productsonsale">
                                        <h3 class="widget-title widget-title ">Special offers</h3>
                                        <ul class="product-list-small">
                                            <li>			
                                                <div class="image">
                                                    <a href="product.html" title="Dip Dye Panel Henley">
                                                        <img src="img/thumbnails/db_file_img_57_160xauto.jpg" alt="Dip Dye Panel Henley" />
                                                    </a>
                                                </div>
                                                <div class="desc">
                                                    <h6>
                                                        <a href="product.html" title="Dip Dye Panel Henley">Dip Dye Panel Henley</a>
                                                    </h6>

                                                    <div class="price">
                                                        £48.00						
                                                        <del style="font-size: 10px;">£60.00</del> 
                                                        <span class="label label-sale">Sale</span>
                                                    </div>

                                                    <div class="rating rating-4.5">
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                        <i class="icon-heart"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>			
                                                <div class="image">
                                                    <a href="product.html" title="Amelia Tote">
                                                        <img src="img/thumbnails/db_file_img_44_160xauto.jpg" alt="Amelia Tote" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>
                                                        <a href="product.html" title="Amelia Tote">Amelia Tote</a>
                                                    </h6>

                                                    <div class="price">
                                                        £48.00						
                                                        <del style="font-size: 10px;">£58.00</del> 
                                                        <span class="label label-sale">Sale</span>
                                                    </div>

                                                    <div class="rating rating-0">
                                                        <a href="#">No reviews &mdash; be the first?</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>			
                                                <div class="image">
                                                    <a href="product.html" title="Navy Polka Dot SS BD">
                                                        <img src="img/thumbnails/db_file_img_175_160xauto.jpg" alt="Navy Polka Dot SS BD" />
                                                    </a>
                                                </div>

                                                <div class="desc">
                                                    <h6>
                                                        <a href="product.html" title="Navy Polka Dot SS BD">Navy Polka Dot SS BD</a>
                                                    </h6>

                                                    <div class="price">
                                                        £131.99						
                                                        <del style="font-size: 10px;">£175.00</del> 
                                                        <span class="label label-sale">Sale</span>

                                                    </div>

                                                    <div class="rating rating-0">
                                                        <a href="#">No reviews &mdash; be the first?</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End  class="widget Productsonsale" -->
                                    
                                    <!-- TopSellingProducts -->
<div class="widget TopSellingProducts">
    <h3 class="widget-title widget-title ">Top selling products</h3>
    <ul class="product-list-small">
        <li>			
            <div class="image">
                <a href="product.html" title="El Silencio">
                    <img src="img/thumbnails/db_file_img_32_160xauto.jpg" alt="El Silencio" />
                </a>
            </div>

            <div class="desc">
                <h6>
                    <a href="product.html" title="El Silencio">El Silencio</a>
                </h6>

                <div class="price">
                    £55.00										
                </div>

                 <div class="rating rating-3">
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                </div>
            </div>
        </li>
        <li>			
            <div class="image">
                <a href="product.html" title="Lisette Dress">
                    <img src="img/thumbnails/db_file_img_48_160xauto.jpg" alt="Lisette Dress" />
                </a>
            </div>

            <div class="desc">
                <h6>
                    <a href="product.html" title="Lisette Dress">Lisette Dress</a>
                </h6>

                <div class="price">
                    £58.00										
                </div>

                <div class="rating rating-0">
                    <a href="#">No reviews &mdash; be the first?</a>
                </div>
            </div>
        </li>
        <li>			
            <div class="image">
                <a href="product.html" title="Dustbowl Snapback">
                    <img src="img/thumbnails/db_file_img_34_160xauto.jpg" alt="Dustbowl Snapback" />
                </a>
            </div>

            <div class="desc">
                <h6>
                    <a href="product.html" title="Dustbowl Snapback">Dustbowl Snapback</a>
                </h6>

                <div class="price">
                    £28.00										
                </div>

                <div class="rating rating-0">
                    <a href="#">No reviews &mdash; be the first?</a>
                </div>
            </div>
        </li>
    </ul>
</div>
<!-- End  class="widget TopSellingProducts" -->									
                                    
                                    <!-- This month only! widget -->
<div class="widget Text">
    <h3 class="widget-title widget-title ">This month only!</h3>
    <h5>Free UK shipping!</h5>
    <h6><i class="icon-gift"> &nbsp; </i> Free gift wrap</h6>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
    <a class="btn btn-primary" href="#">
        BUY NOW <em>for</em> $85
    </a>
</div>
<!-- End class="widget Text" -->									
                                    
                                </aside>
                                
                                <!-- End sidebar -->
                                
                            </div>

                            
                            <div class="span9">

                                <!-- Products list -->
<ul class="product-list isotope">
    <li class="standard" data-price="58">
        <a href="product.html" title="Lisette Dress">
            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_48_640xauto.jpg" alt="Lisette Dress" />
                <img class="secondary" src="img/thumbnails/db_file_img_49_640xauto.jpg" alt="Lisette Dress" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£58.00</span>
                </div>
                <h3>Lisette Dress</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="55">
        <a href="product.html" title="El Silencio">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_32_640xauto.jpg" alt="El Silencio" />
                <img class="secondary" src="img/thumbnails/db_file_img_33_640xauto.jpg" alt="El Silencio" />
                <span class="badge badge-sale">SALE</span>
            </div>

            <div class="title">
                <div class="prices">
                    <del class="base">£58.00</del> 
                    <span class="price">£57.99</span> 
                </div>
                <h3>El Silencio</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="88">
        <a href="product.html" title="Malta Dress">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_137_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_138_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£88.00</span>
                </div>

                <h3>Malta Dress</h3>

                <div class="rating rating-5">
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                </div>
            </div>

        </a>
    </li>
    <li class="standard" data-price="70">
        <a href="product.html" title="Babar Soul">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_92_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_93_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£70.00</span>
                </div>
                <h3>Babar Soul</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="220">
        <a href="product.html" title="Babar Afrique">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_87_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_88_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£220.00</span>
                </div>
                <h3>Babar Afrique</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="50">
        <a href="product.html" title="Nep Pocket Tee">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_10_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£50.00</span>
                </div>
                <h3>Nep Pocket Tee</h3>

                <div class="rating rating-3">
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                </div>
            </div>

        </a>
    </li>
    <li class="featured" data-price="28">
        <a href="product.html" title="Dustbowl Snapback">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_34_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_35_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£28.00</span>
                </div>
                <h3>Dustbowl Snapback</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="140">
        <a href="product.html" title="Carstensen">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_97_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_98_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£140.00</span>
                </div>
                <h3>Carstensen</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="195">
        <a href="product.html" title="Classic Glasgow in Silver">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_151_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_152_640xauto.jpg" alt="" />
                <span class="badge badge-sale">SALE</span>
            </div>

            <div class="title">
                <div class="prices">
                    <del class="base">£499.00</del> 
                    <span class="price">£198.00</span> 
                </div>
                <h3>Classic Glasgow</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="38">
        <a href="product.html" title="El Paso Tank">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_122_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_123_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£38.00</span>
                </div>
                <h3>El Paso Tank</h3>

                <div class="rating rating-4.5">
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                </div>
            </div>

        </a>
    </li>
    <li class="standard" data-price="72">
        <a href="product.html" title="Bay Blocker">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_39_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£72.00</span>
                </div>
                <h3>Bay Blocker</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="58">
        <a href="product.html" title="Marais Dress">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_42_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_43_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£58.00</span>
                </div>
                <h3>Marais Dress</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="48">
        <a href="product.html" title="Amelia Tote">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_44_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_45_640xauto.jpg" alt="" />

                <span class="badge badge-sale">SALE</span>
            </div>

            <div class="title">
                <div class="prices">
                    <del class="base">£58.00</del> 
                    <span class="price">£48.00</span> 
                </div>
                <h3>Amelia Tote</h3>
            </div>

        </a>
    </li>
    <li class="standard" data-price="228">
        <a href="product.html" title="Navy Linen Blazer">

            <div class="image">
                <img class="primary" src="img/thumbnails/db_file_img_155_640xauto.jpg" alt="" />
                <img class="secondary" src="img/thumbnails/db_file_img_159_640xauto.jpg" alt="" />
            </div>

            <div class="title">
                <div class="prices">
                    <span class="price">£228.00</span>
                </div>
                <h3>Navy Linen Blazer</h3>
            </div>

        </a>
    </li>
</ul>
<!-- End class="product-list isotope" -->                
                                
                                <!-- "Load More" Button -->

                                <button id="load_more" class="btn btn-block" data-category="16" data-rows="20" data-page="1" data-featured="true">
                                    <span>Load more</span> &nbsp; <i class="icon-spinner icon-spin icon-large"></i>
                                </button>
                                
                                <!-- End "Load More" Button -->

                            </div>
                            

                        </div>
                    </div>

                </section>

	
                <!-- End class="category" -->
                
            </section>
            <!-- End class="main" -->

            

            
              <?php include('maestros/footer.php') ?>