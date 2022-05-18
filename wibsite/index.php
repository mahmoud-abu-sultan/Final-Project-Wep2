<?php
require_once 'controller/StoreController.php';
include_once 'partial/top_temp.php';
require_once 'controller/CategoryController.php';


$like = null;
$dislike = null;
if(isset($_POST['like'])){
    $like = 1;
    $dislike = 0;
}
$data = (new CategoryController())->index();
$stores = (new StoreController())->index();
    if(!(count($data) > 0)){
        $msg['no_data'] = "No Result";
    }
    if(!(count($stores) > 0)){
        $msg['no_stores'] = "No Result";
    }


?>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                <?php

                foreach ($data as $item) {

                    echo '
                    <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        
                    </div>
                    <div class="shop-body">
                        <h3>'.$item->getName().'</h3>
                        <a href="show_category.php?id='.$item->getId().'" class="cta-btn">Show now <i class="fa fa-arrow-circle-right"></i></a>
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
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                <?php
                if(!empty($_SESSION['rating'])){
                    echo '
                    <div class="alert alert-success" role="alert">
                        '.$_SESSION['rating'].'
                    </div>
                    ';
                    $_SESSION['rating'] = null;
                }elseif (!empty($_SESSION['rating_error'])){
                    echo '
                    <div class="alert danger" role="alert">
                        '.$_SESSION['rating_error'].'
                    </div>
                    ';
                    $_SESSION['rating_error'] = null;
                }
                ?>

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
                                                    <img src="./img/product01.png" alt="">
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