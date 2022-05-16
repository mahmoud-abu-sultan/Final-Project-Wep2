<?php
require_once 'Controller.php';
require_once '../model/Category.php';

class CategoryController extends Controller{
    public function index()
    {
        // TODO: Implement index() method.
        $dataCategory = [];

        $category = new Category();
        $data = $category->select()->get();
        foreach ($data as $item){
            $setDataCat = new Category();
            $setDataCat->setId($item['id']);
            $setDataCat->setName($item['name']);
            $setDataCat->setDescription($item['description']);

            array_push($dataCategory,$setDataCat);
        }

        return $dataCategory;
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        $category = new Category();
        $data = $category->select($id)->get();
        $category->setId($data[0]['id']);
        $category->setName($data[0]['name']);
        $category->setDescription($data[0]['description']);

        return $category;
    }

    public function store(Category $data = null)
    {
        // TODO: Implement store() method.
        $status = false;
        if($data != null){
            $category = new Category();
            $name = $data->getName();
            $description = $data->getDescription();
            $isSaved = $category->insert("name,description","$name,$description");
            if($isSaved){
                $status = true;
            }
        }else {
            throw new Exception("Data is required");
        }
        return $status;
    }

    public function update($id,$data = null)
    {
        // TODO: Implement update() method.
        $status = false;
        if($data != null){
            $category = new Category();
            $name = $data->getName();
            $description = $data->getDescription();
            $isSaved = $category->update("name = '$name' , description = '$description'",$id);
            if($isSaved){
                $status = true;
            }
        }else {
            throw new Exception("Data is required");
        }
        return $status;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $category = new Category();
        $isDeleted = $category->delete($id);
        return (bool) $isDeleted;
    }
}
