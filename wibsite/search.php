<?php
require_once 'controller/StoreController.php';
include_once 'partial/top_temp.php';


if(!empty($_GET['s'])){
    $name = $_GET['s'];
    $stores = (new StoreController())->search($name);

    if(!(count($stores) > 0)){
        $msg['no_stores'] = "No Result";
    }
}else{
    die("<h1>Name is requierd</h1>");
}


?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">


				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>

					</div>
				</div>
				<!-- /section title -->


				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">

                                    <?php
                                    foreach ($stores as $item){
                                        echo '
                                        
                                        
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="../Dashborde'.$item->getLogo().'" alt="">
                                                    <div class="product-label">
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">'.$item->getName().'</a></h3>
                                                    <div class="product-rating">
                                                        <span>'.$item->getRating().'</span>
                                                    </div>
                                                    <div class="product-btns">
                                                        <form method="get" action="add_rating.php">
                                                        <input type="hidden" name="id" value="'.$item->getId().'">
                                                            <button  type="submit" class="add-to-wishlist " ><i class="fa fa-heart-o"></i><span class="tooltipp">Like</span></button>
                                                        </form>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view" onclick="window.location.href = \'show_shops.php?id='.$item->getId().'\' "><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
        
                                            </div>
                                            <!-- /product -->
                                        
                                        ';
                                    }

                                    ?>




								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


<?php

    include_once 'partial/bottom_temp.php'
?>