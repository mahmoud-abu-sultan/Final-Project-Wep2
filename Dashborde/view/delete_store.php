<?php
require_once '../controller/StoreController.php';
if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $store = new StoreController();
    $isDelete = $store->delete($id);
    if($isDelete){
        header("Location:show_store.php");
    }else{
        die("Error Deleted Store !");
    }

}else{
    die("Id Store is required !");
}