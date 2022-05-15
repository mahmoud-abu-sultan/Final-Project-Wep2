<?php
require_once '../controller/StoreController.php';
require_once '../model/Store.php';

$errors = [];
$success = false;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['id'])){
        $categoryId = $_GET['id'];
        $dataCategory = (new StoreController())->show($categoryId);


    }else{
        header('Location:show_store.php');
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST['name'];
    $descreption = $_POST['descreption'];
    $phone_number = $_POST['phone_number'];
    $category_id = $_POST['category_id'];

    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    }
    if (empty($_FILES["image"])) {
        $errors['image'] = "image is required";
    }

    if (empty($_POST["phone_number"])) {
        $errors['phone_number'] = "Phone Number is required";
    }

    //-----------
    if (!count($errors) > 0) {
        $file = $_FILES['image'];
        $store = new Store();
        $store->setName($name);
        $store->setDescription($descreption);
        $store->setPhone($phone_number);
        $store->setCategoryId($category_id);
        $store->setLogo($file);
        $categoryId = $_GET['id'];
        $storeController = new StoreController();
        $isSaved = $storeController->update($categoryId,$store);

        if ($isSaved) {
            # code...
            echo "isSaved";

            $success = true;
            header('Location:show_store.php');
        } else {
            # code...
            echo "errors";
            $errors['general_error'] = "Some Error !";
        }
    }
}
?>

<?php
include "../partial/top_temp.php";
?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Main </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">Shops</a>
                                </li>
                                <li class="breadcrumb-item active">Add New Store
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"></h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <?php
                                            if (!empty($errors['general_error'])) {
                                                echo "<div class='alert alert-danger'>" . $errors['general_error'] . "</div>";
                                            } elseif ($success) {
                                                echo "<div class='alert alert-success'>Store Added Successfully</div>";
                                            }
                                            ?>

                                            <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $categoryId?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i>Add Store
                                                    </h4>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> Name </label>
                                                                <input type="text" id="name_ar" class="form-control" placeholder="Enter Name Of Store" name="name" value="<?php echo $dataCategory->getName() ?>">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['name'])) {
                                                                        print_r($errors['name']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- --- -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> descreption </label>
                                                                <input type="text" id="descreption" class="form-control" placeholder="Enter descreption Of Store" name="descreption" value="<?php echo $dataCategory->getDescription() ?>">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['descreption'])) {
                                                                        print_r($errors['descreption']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">

                                                        <!-- --- -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="name"> phone_number </label>
                                                                <input type="text" id="phone_number" class="form-control" placeholder="phone number" name="phone_number" value="<?php echo $dataCategory->getPhone() ?>">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['phone_number'])) {
                                                                        print_r($errors['phone_number']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> Category </label>
                                                                <select class="form-control" name="category_id">
                                                                    <?php
                                                                    require_once '../controller/CategoryController.php';
                                                                    $category = new CategoryController();
                                                                    $data = $category->index();
                                                                    foreach ($data as $item){
                                                                        if($item->getId() == $dataCategory->getCategoryId()){
                                                                            echo "<option value='".$item->getId()."' selected>".$item->getName()."</option>";

                                                                        }else{
                                                                            echo "<option value='".$item->getId()."' >".$item->getName()."</option>";
                                                                        }
                                                                    }

                                                                    ?>
                                                                </select>
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['category_id'])) {
                                                                        print_r($errors['category_id']);
                                                                    }
                                                                    ?>

                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- --- -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <img src="..<?php echo $dataCategory->getLogo()?> " width="50" height="50">
                                                                <label for="name"> Image </label>
                                                                <input type="file" class="form-control" name="image">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['image'])) {
                                                                        print_r($errors['image']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ------------------------------------------------ -->

                                                </div>
                                        </div>

                                        <section id="chkbox-radio">
                                            <div class="row">

                                            </div>

                                        </section>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> Back
                                            </button>
                                            <button type="submit" id="btn_create_product" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
    </div>

<?php
include "../partial/bottom_temp.php";
?>
