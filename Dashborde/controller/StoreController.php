<?php

require_once 'Controller.php';
require_once '../model/Store.php';
class  StoreController extends Controller{


    public function  index()
    {
        // Get And Show all data
        $dataStore = [];
        $store = new Store();
        $data = $store->select()->get();

        foreach ($data as $item) {
            $store_data = new Store();
            $store_data->setId($item['id']);
            $store_data->setName($item['name']);
            $store_data->setDescription($item['description']);
            $store_data->setPhone($item['phone']);
            $store_data->setLogo($item['logo']);
            $store_data->setCategoryId($item['category_id']);
            array_push($dataStore,$store_data);
        }

        return $dataStore;

    }

    public function show($id)
    {
        // Get And Show data where is id = $id
        $store = new Store();
        $data = $store->select($id)->get();
        if(!empty($data)){
            $store->setId($data[0]['id']);
            $store->setName($data[0]['name']);
            $store->setDescription($data[0]['description']);
            $store->setPhone($data[0]['phone']);
            $store->setLogo($data[0]['logo']);
            $store->setCategoryId($data[0]['category_id']);
        }
        return $store;

    }


    public function store(Store $data = null)
    {

        $status = false;
        // Insert Data on data base

        if($data != null){
            $name = $data->getName();
            $description = $data->getDescription();
            $phone = $data->getPhone();
            $categoryId = $data->getCategoryId();
            $logo = $data->getLogo();

            $imgName = '../uploder/images/' . $data->getName() . basename($logo['name']);
            $nameImgForDB = "/uploder/images/" . $data->getName() . basename($logo['name']);

            $upFile = move_uploaded_file($logo['tmp_name'],$imgName);
            if($upFile){
                $status = true;
                (new Store())->insert("name , description , phone , logo , category_id","$name,$description,$phone,$nameImgForDB,$categoryId");
            }else{
                throw new Exception("File is Error uploaded");
            }
        }

        return $status;



    }

    public function update($id,Store $data = null)
    {
        // Update data on database where id = $id
        $status = false;

        if($data != null){
            $name = $data->getName();
            $description = $data->getDescription();
            $phone = $data->getPhone();
            $categoryId = $data->getCategoryId();
            $logo = $data->getLogo();

            $imgName = '../uploder/images/' . $data->getName() . basename($logo['name']);
            $nameImgForDB = "/uploder/images/" . $data->getName() . basename($logo['name']);
            $upFile = move_uploaded_file($logo['tmp_name'],$imgName);
            if($upFile){
                (new Store())->update("name = '$name' , description = '$description' , phone = '$phone', logo = '$nameImgForDB' , category_id = '$categoryId'",$id);
                $status = true;

            }else{
                throw new Exception("File is Error uploaded");
            }
        }

        return $status;


    }

    public function delete($id)
    {
        // Delete record where id = $id
        $rating = (new Rating())->deleteWhere('stor_id = '.$id);
        if($rating){
            $store = new Store();
            $isDeleted = $store->delete($id);
            if($isDeleted){
                return true;
            }else{
                return false;
            }
        }
    }
}