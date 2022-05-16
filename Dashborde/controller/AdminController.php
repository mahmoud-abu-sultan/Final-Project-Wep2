<?php
require_once 'Controller.php';
require_once '../model/Admin.php';

class AdminController extends Controller{

    public function index()
    {
        // TODO: Implement index() method.
        $dataAdmin = [];

        $admin = new Admin();
        $data = $admin->select()->get();

        foreach ($data as $item) {
            $admin_data = new Admin();
            $admin_data->setId($item['id']);
            $admin_data->setName($item['name']);
            $admin_data->setDescription($item['description']);
            $admin_data->setStatus($item['status']);
            array_push($dataAdmin,$admin_data);
        }

        return $dataAdmin;
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