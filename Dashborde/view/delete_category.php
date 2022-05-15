<?php
include_once "DB_connection.php";
$id = $_POST['id'];
$query = "DELETE from category WHERE id=$id";
$result = mysqli_query($connection, $query);
if ($result) {
    # code...
    header('Location:show_category.php');
}
