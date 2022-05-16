<?php
require_once '../controller/CategoryController.php';
if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $category = new CategoryController();
    $isDelete = $category->delete($id);
    if($isDelete){
        header("Location:show_category.php");
    }else{
        die("Error Deleted Store !");
    }

}else{
    die("Id Store is required !");
}