<?php
require_once '../controller/CategoryController.php';
require_once '../model/Category.php';
$errors = [];
$success = false;
$id = null;
$dataCategory = null;
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $dataCategory = (new CategoryController())->show($id);
    }else{
        die("ID IS REQUIRD : 404 !");
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['c_name'];
    $descreption = $_POST['c_descreption'];

    if (empty($name)) {
        $errors['name_error'] = "Name Is Required Please Fill It";
    }
    if (empty($descreption)) {
        $errors['descreption_error'] = "Descreption Is Required Please Fill It";
    }

    if (count($errors) > 0) {
        $errors['general_error'] = "Please Fix All Error -_-";
    } else {
        $id = $_GET['id'];
        $category = new Category();
        $category->setName($name);
        $category->setDescription($descreption);

        $categoryController = new CategoryController();

        $isSave = $categoryController->update($id,$category);

        if ($isSave) {
            # code...
            $errors = [];
            $success = true;
            header('Location:show_category.php');
        } else {
            $errors['general_error'] = "Some Errors !";
        }
    }
}
?>
    <!-- ------------------------------------------------ -->
<?php
include "../partial/top_temp.php";
?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Revenue, Hit Rate & Deals -->
                Update Category
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Category Info</h4>
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
                                    <div class="card-body">
                                        <?php
                                        if (!empty($errors['general_error'])) {
                                            echo "<div class='alert alert-danger'>" . $errors['general_error'] . "</div>";
                                        } elseif ($success) {
                                            echo "<div class='alert alert-success'>" . "Category Added Successfully ^_^" . "</div>";
                                        }
                                        ?>
                                        <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id ?>">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Add New Category</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Category Name</label>
                                                            <input type="text" id="projectinput1" class="form-control" placeholder="Category Name" name="c_name" value="<?php echo $dataCategory->getName()?>">
                                                            <?php
                                                            if (!empty($errors['name_error'])) {
                                                                echo "<span class='text-danger'>" . $errors['name_error'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">Category Descreption</label>
                                                            <input type="text" id="projectinput2" class="form-control" placeholder="Category Descreption" name="c_descreption" value="<?php echo $dataCategory->getDescription()?>">
                                                            <?php
                                                            if (!empty($errors['descreption_error'])) {
                                                                echo "<span class='text-danger'>" . $errors['descreption_error'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Analytics map based session -->
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php
include "../partial/footer.php";
?>