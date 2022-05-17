<?php

require_once 'controller/CategoryController.php';
include_once 'partial/top_temp.php';
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $data = (new CategoryController())->getStore($id);

}else{
$msg['no_data'] = "No Result";
}
?>
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
                        <img src="../Dashborde'.$item->getLogo().'" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>'.$item->getName().'</h3>
                        <a href="show_shops.php?id='.$item->getId().'" class="cta-btn">Show now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
                
                ';
            }
            ?>
            <!-- shop -->

            <!-- /shop -->


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<?php

include_once 'partial/bottom_temp.php'
?>
