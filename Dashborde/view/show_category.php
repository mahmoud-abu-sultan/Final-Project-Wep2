<?php
require_once '../controller/CategoryController.php';
require_once '../model/Category.php';
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
                                <h4 class="card-title">All Categories </h4>
                                <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                <div class="card-body card-dashboard">
                                    <table style="width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                        <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th> Category Details</th>
                                            <th>Edit</th>
                                            <th>DELETE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
  <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->
                                            <?php
                                                $category = new CategoryController();
                                                $data = $category->index();
                                                foreach ($data as $item){

                                                    # code...
                                                    echo "<tr>".
                                                            "<td>". $item->getName(). "</td>".
                                                            "<td>". $item->getDescription(). "</td>".
                                                            "<td>". "<a href='edit_category.php?id=".$item->getId()."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'><i
                                                            class='icon-eye'></i></a>" . "</td>".
                                                        "<td>". "<a href='delete_category.php?id=".$item->getId()."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'>Delete" . "</td>".
                                                         "</tr>";
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
<script>
    $('.delete_category').click(function (){
        var result = confirm('Are You Sure !!!');
        if (result) {
            $('.c_form').submit();
        }
    });
</script>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<?php
include "../partial/footer.php";
?>

