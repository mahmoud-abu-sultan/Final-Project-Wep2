<?php
$connection = mysqli_connect ('localhost', 'root', '', 'store_manger');
if (!$connection) {
    # code...
    die('Error ^_^' .mysqli_connect_error());
}
?>