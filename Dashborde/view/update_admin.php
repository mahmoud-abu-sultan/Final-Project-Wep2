<?php
require_once '../controller/AdminController.php';
require_once '../model/Admin.php';

$errors = [];
$success = false;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['id'])){
        $adminId = $_GET['id'];
        $dataAdmin = (new AdminController())->show($adminId);


    }else{
        header('Location:show_admin.php');
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST['name'];
    $descreption = $_POST['descreption'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $status = null;
    if(!empty($_POST['status'])){
        $status =  1 ;
    }else{
        $status =  0;
    }
    $password = $_POST['password'];
    $title = $_POST['title'];

    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "email is required";
    }

    if (empty($_POST["title"])) {
        $errors['title'] = "title is required";
    }

//    if (empty($_POST["status"])) {
//        $errors['status'] = "status is required";
//    }

    if (empty($_POST["password"])) {
        $errors['password'] = "password is required";
    }

    if (empty($_POST["title"])) {
        $errors['title'] = "title is required";
    }
    //-----------
    if (!count($errors) > 0) {
        $admin = new Admin();

        $admin->setStatus($status);
        $admin->setName($name);
        $admin->setEmail($email);
        $admin->setDescription($descreption);
        $admin->setPasswordAdmin($password);
        $admin->setTitle($title);

        $adminId = $_GET['id'];
        $adminController = new AdminController();
        $isSaved = $adminController->update($adminId,$admin);

        if ($isSaved) {
            # code...
            echo "isSaved";

            $success = true;
            header('Location:show_admin.php');
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

                                            <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $adminId?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i>Add Store
                                                    </h4>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> Name </label>
                                                                <input type="text" id="name_ar" class="form-control" placeholder="Enter Name Of Store" name="name" value="<?php echo $dataAdmin->getName() ?>">
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
                                                                <input type="text" id="descreption" class="form-control" placeholder="Enter descreption Of Store" name="descreption" value="<?php echo $dataAdmin->getDescription() ?>">
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
                                                                <label for="name"> Title </label>
                                                                <input type="text" id="title" class="form-control" placeholder="Jop Title" name="title" value="<?php echo $dataAdmin->getTitle() ?>">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['title'])) {
                                                                        print_r($errors['title']);
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
                                                                <label for="name"> Email </label>

                                                                <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="<?php echo $dataAdmin->getEmail() ?>">

                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['email'])) {
                                                                        print_r($errors['email']);
                                                                    }
                                                                    ?>

                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- --- -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> Password </label>
                                                                <input type="text" id="password" class="form-control" placeholder="Password" name="password" value="<?php echo $dataAdmin->getPasswordAdmin() ?>">

                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['password'])) {
                                                                        print_r($errors['password']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name"> Active :  </label>
                                                            <input type="checkbox" id="status" class="checkbox"  name="status"
                                                                <?php

                                                                    if($dataAdmin->getStatus()){
                                                                        echo "checked";
                                                                    }
                                                                ?>

                                                            >

                                                        </div>
                                                    </div>
                                                </div>

                                                </div>
                                        </div>


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
