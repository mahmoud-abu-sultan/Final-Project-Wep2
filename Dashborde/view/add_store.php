<?php
include "DB_connection.php";
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $descreption = $_POST['descreption'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $category_id = $_POST['category_id'];

    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    }
    if (empty($_POST["address"])) {
        $errors['address'] = "Address is required";
    }
    if (empty($_POST["phone_number"])) {
        $errors['phone_number'] = "Phone Number is required";
    }
    // if ($_FILES['logo_image']['size'] > 5000000000) {
    //     $errors['logo_image'] = "Image Too Large";
    // }
    // if ($_FILES['logo_image']['type'] !="jpg") {
    //     $errors['logo_image'] = "Image must be png type";
    // }
    //-----------
    if (!count($errors) > 0) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_tmp_name = $_FILES['image']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_new_name = time() . rand(1, 100000) . ".$file_ext";

        $uplode_path = 'uploder/images/' . $file_new_name;
        move_uploaded_file($file_tmp_name, $uplode_path);

        $query = "INSERT INTO shops(name,descreption,address,phone_number,logo_image,category_id)
                    VALUES ('$name','$descreption','$address','$phone_number','$file_new_name','$category_id');";
        $result = mysqli_query($connection, $query);
        $last_id = mysqli_insert_id($connection);
        if ($result) {
            # code...
            $success = true;
            header('Location:show_store.php');
        } else {
            # code...
            $errors['general_error'] = $connection->error;
        }
    }
}
?>

<html>
<?php
include "partial/headar.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php
    include "partial/nav.php";
    include "partial/sidepar.php";
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
                                                echo "<div class='alert alert-success'>Product Added Successfully</div>";
                                            }
                                            ?>

                                            <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i>Add Store
                                                    </h4>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> Name </label>
                                                                <input type="text" id="name_ar" class="form-control" placeholder="Enter Name Of Store" name="name">
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
                                                                <input type="text" id="descreption" class="form-control" placeholder="Enter descreption Of Store" name="descreption">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> address </label>
                                                                <input type="text" id="address" class="form-control" placeholder="address" name="address">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['address'])) {
                                                                        print_r($errors['address']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- --- -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name"> phone_number </label>
                                                                <input type="text" id="phone_number" class="form-control" placeholder="phone number" name="phone_number">
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
                                                                    include_once "DB_connection.php";
                                                                    $query = "SELECT * from category";
                                                                    $result = mysqli_query($connection, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
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
                                                                <label for="name"> Image </label>
                                                                <input type="file" class="form-control" name="logo_image[]">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['logo_image'])) {
                                                                        print_r($errors['logo_image']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">
                                                        <div class="form-group mt-1 col-lg-3">
                                                            <input type="checkbox" value="1" name="active" id="switcheryColor4" class="switchery" data-color="success" checked />
                                                            <label for="switcheryColor4" class="card-title ml-2  mr-2">status
                                                            </label>
                                                        </div>
                                                    </div>
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
    include "partial/footer.php";
    ?>
</body>

</html>
<!-- 

 -->