<?php
require_once 'controller/StoreController.php';
require_once 'model/Store.php';
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $store = (new Store())->select($id)->count();
    if($store > 0){
        // code hear
        $storeController = new StoreController();
        $isSave = $storeController->like($id);
        if($isSave){
            $_SESSION['rating'] = "Success add rating";
        }else{
            $_SESSION['rating_error'] = "Error add rating";
        }
        header("Location:index.php");
    }else{
        die("No Result 404");

    }
}else{
    die("ID Store is Requierd");
}
