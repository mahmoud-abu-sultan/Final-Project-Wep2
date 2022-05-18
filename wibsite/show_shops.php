<?php
require_once 'controller/StoreController.php';
require_once 'model/Store.php';
include_once 'partial/top_temp.php';
$dataAllStore = (new StoreController())->index();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $isData = (new Store())->select($id)->count();
    if($isData>0){
        $dataStore = (new StoreController())->show($id);
    }else{
        $error['no_data'] = "No Result 404";
    }
}else{
    die("Id Is Requierd");

}
?>

    <div class="section">
        <a>
            <!-- container -->
        </a><div class="container"><a>
                <!-- row -->
            </a><div class="row"><a>
                    <!-- Product main img -->
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img" class="slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1832px;">
                                    <div class="product-preview slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 458px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; overflow: hidden; transition: opacity 300ms ease 0s;">
                                        <img src="./img/product01.png" alt="">
                                        <img role="presentation" src="file:///C:/Users/DELL/Desktop/electro/img/product01.png" class="zoomImg" style="position: absolute; top: -118.003px; left: -1.98428px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="product-preview slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 458px; position: relative; left: -458px; top: 0px; z-index: 998; opacity: 0; overflow: hidden; transition: opacity 300ms ease 0s;">
                                        <img src="./img/product03.png" alt="">
                                        <img role="presentation" src="file:///C:/Users/DELL/Desktop/electro/img/product03.png" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>

                                    <div class="product-preview slick-slide slick-current slick-active" data-slick-index="2" aria-hidden="false" tabindex="0" style="width: 458px; position: relative; left: -916px; top: 0px; z-index: 999; opacity: 1; overflow: hidden;">
                                        <img src="<?php echo '../Dashborde'.$dataStore->getLogo()?>" alt="">
                                        <img role="presentation" src="<?php echo '../Dashborde'.$dataStore->getLogo()?>" class="zoomImg" style="position: absolute; top: -55.3738px; left: -137.783px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>

                                    <div class="product-preview slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 458px; position: relative; left: -1374px; top: 0px; z-index: 998; opacity: 0; overflow: hidden;">
                                        <img src="./img/product08.png" alt="">
                                        <img role="presentation" src="file:///C:/Users/DELL/Desktop/electro/img/product08.png" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;"></div>
                                </div>
                            </div>






                            <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;">Next</button></div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs" class="slick-initialized slick-slider slick-vertical">







                        </div>
                    </div>
                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                </a><div class="col-md-5"><a>
                    </a><div class="product-details"><a>
                            <h2 class="product-name"><?php echo $dataStore->getName()?></h2>
                        </a><div><a class="review-link" href="#"><?php echo $dataStore->getRating()?> Review(s)</a>
                        </div>

                        <p><?php echo $dataStore->getDescription()?></p>









                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->

                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>



    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>


                <?php

                foreach ($dataAllStore as $item){
                    echo '
                    
                    
                    
                    
                    <div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="../Dashborde'.$item->getLogo().'" alt="">
								
							</div>
							<div class="product-body">
								<h3 class="product-name"><a href="show_shops.php?id='.$item->getId().'">'.$item->getName().'</a></h3>
                                <p class="product-category">'.$item->getDescription().'</p>

								
							</div>
							
						</div>
					</div>
                    
                    
                    
                    ';
                }
                ?>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
   <?php
include_once 'partial/bottom_temp.php';

?>