<?php
include "DB_connection.php";
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password =md5($_POST['password']);
    isset($_POST['status']) ? $status = $_POST['status'] : $status = 0;
    $address = $_POST['address'];
    $description = $_POST['description'];

    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    }
    if (empty($_POST["phone_number"])) {
        $errors['phone_number'] = "Phone Number is required";
    }
    if (empty($_POST["email"])) {
        $errors['email'] = "email is required";
    }
    if (empty($_POST["password"])) {
        $errors['password'] = "password is required";
    }
    if (empty($_POST["address"])) {
        $errors['address'] = "address is required";
    }
    //-----------
    if (!count($errors) > 0) {
        $date = date('Y-m-d h:i:s');
        //---

        $query = "INSERT INTO user(name,phone_number,email,password,status,address,description)
                    VALUES ('$name','$phone_number','$email','$password','$status','$address','$description');";
        $result = mysqli_query($connection, $query);
        $last_id = mysqli_insert_id($connection);
        if (!$result) {
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
                                <li class="breadcrumb-item"><a href="">User</a>
                                </li>
                                <li class="breadcrumb-item active">Add New User
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
                                                    <h4 class="form-section"><i class="ft-home"></i>Add New User
                                                    </h4>
                                                    <!-- ------------------------------------------------ -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nam"> Name </label>
                                                                <input type="text" id="nam" class="form-control" placeholder="Enter Name" name="name">
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
                                                                <label for="pho"> phone number </label>
                                                                <input type="text" id="pho" class="form-control" placeholder="Enter phone number" name="phone_number">
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
                                                                <label for="ema"> email </label>
                                                                <input type="text" id="ema" class="form-control" placeholder="Enter email" name="email">
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
                                                                <label for="pass"> password </label>
                                                                <input type="text" id="pass" class="form-control" placeholder="Enter Password" name="password">
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
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="addre"> address </label>
                                                                <input type="text" id="addre" class="form-control" placeholder="Enter address" name="address">
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
                                                                <label for="desc"> description </label>
                                                                <input type="text" id="desc" class="form-control" placeholder="Enter description" name="description">
                                                                <span class="text-danger errors">
                                                                    <?php
                                                                    if (isset($errors['description'])) {
                                                                        print_r($errors['description']);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- --- -->
                                                    <div class="row">
                                                        <div class="form-group mt-1 col-lg-3">
                                                            <input type="checkbox" value="1" name="status" id="switcheryColor4" class="switchery" data-color="success" checked />
                                                            <label for="switcheryColor4" class="card-title ml-2  mr-2">status
                                                            </label>
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