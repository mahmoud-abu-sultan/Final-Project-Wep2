<?php
include "../partial/top_temp.php";
?>

    <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Revenue, Hit Rate & Deals -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Store </h4>
                                <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a href="add_admin.php">Add New</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table style="width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Admin Name</th>
                                            <th> Admin Details</th>
                                            <th> Admin status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->
                                        <?php
                                        require_once '../controller/AdminController.php';
                                        $admin = new AdminController();
                                        $data = $admin->index();
                                        $index = 1;
                                        $status = "inActive";

                                        foreach ($data as $key => $item){
                                            if($item->getStatus() == 1){$status = "Active";}
                                            echo "<tr>".
                                                    "<td>".$index++."</td>".
                                                    "<td>".$item->getName()."</td>".
                                                    "<td>".$item->getDescription()."</td>".
                                                    "<td>".$status."</td>";

                                            if($item->getId() == $_SESSION['userInfo']['id']){
                                                echo "<td>This You !</td>";
                                            }else{

                                            echo
                                                    "<td>". "

                                                    <a href='profile.php?id=1' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'>show
                                                    </a>
                                                    
                                                    <a href='update_admin.php?id=".$item->getId()."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'>Edit
                                                    </a>
                                                    
                                                    <a href='delete_admin.php?id=".$item->getId()."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'>Delete
                                                    </a>
                                                    "
                                                    ."</td>".
                                                    "</tr>";
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <div class="col-12">
                                        <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->
                                    </div>
                                    <div class="justify-content-center d-flex">
                                    </div>
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
include "../partial/bottom_temp.php";
?>
