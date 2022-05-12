<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php
include "partial/headar.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
  data-col="2-columns">
  <!-- fixed-top-->
  <?php
  include "partial/nav.php";
  include "partial/sidepar.php";
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
                                            include_once "DB_connection.php";
                                            $query="SELECT * FROM category ORDER BY id DESC";
                                            $result=mysqli_query($connection,$query);
                                            if(mysqli_num_rows($result)>0){
                                                while ($row=mysqli_fetch_assoc($result)) {
                                                    # code...
                                                    echo "<tr>".
                                                            "<td>". $row['name']. "</td>".
                                                            "<td>". $row['descreption']. "</td>".
                                                            "<td>". "<a href='edit_category.php?id=".$row['id']."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'><i
                                                            class='icon-eye'></i></a>" . "</td>".
                                                            "<td>". 
                                                                "<form class='c_form' action='delete_category.php' method='post'>
                                                                <input type='hidden' name='id' value='".$row['id']."'>
                                                                        <button type='button' class='btn btn-danger delete_category' id='delete-btn'>
                                                                             DELETE
                                                                        </button>
                                                                </form>" . 
                                                            "</td>".
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
include "partial/footer.php";
?>



  <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->
  <script>
        $('.delete_category').click(function (){
            var result = confirm('Are You Sure !!!');
            if (result) {
                $('.c_form').submit();
            }
        });
</script>
</body>

</html>