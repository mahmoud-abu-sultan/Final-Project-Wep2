<?php
require_once '../controller/AdminController.php';
if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $admin = new AdminController();
    $isDelete = $admin->delete($id);
    if($isDelete){
        header("Location:show_admin.php");
    }else{
        die("Error Deleted Admin !");
    }

}else{
    die("Id Admin is required !");
}