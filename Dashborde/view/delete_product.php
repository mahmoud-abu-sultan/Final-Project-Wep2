<?php
echo "hi hi cabten";
include_once "DB_connection.php";
$id=$_POST['id'];
$query="SELECT * FROM product_file WHERE product_id=$id";
$result=mysqli_query($connection,$query);
while ($row=mysqli_fetch_assoc($result)) {
    # code...
    unlink("uploder/images/".$row['image']);
}

$query1="DELETE from product_file WHERE product_id=$id";
$result1=mysqli_query($connection,$query1);
if ($result1) {
    # code...
    $query1="DELETE from product WHERE id=$id";
    $result2=mysqli_query($connection,$query1);
    if ($result2) {
        # code...
        header('Location:show_product.php');
    }
}

?>