<?php
$connection = mysqli_connect ('localhost', 'root', '', 'final_project');
if (!$connection) {
    # code...
    die('Error ^_^' .mysqli_connect_error());
}
?>