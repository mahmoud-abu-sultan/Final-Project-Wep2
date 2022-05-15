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
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
