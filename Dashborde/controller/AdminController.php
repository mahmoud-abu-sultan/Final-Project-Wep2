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

        $admin = new Admin();
        $data = $admin->select($id)->get();
        $admin->setId($data[0]['id']);
        $admin->setStatus($data[0]['status']);
        $admin->setName($data[0]['name']);
        $admin->setEmail($data[0]['email']);
        $admin->setDescription($data[0]['description']);
        $admin->setPasswordAdmin($data[0]['password']);
        $admin->setTitle($data[0]['title']);
        return $admin;
    }

    public function store(Admin $data = null)
    {
        // TODO: Implement store() method.
        $status = false;
        // TODO: Implement update() method.
        if($data != null){
            $admin = new Admin();
            $name = $data->getName();
            $description = $data->getDescription();
            $email = $data->getEmail();
            $password = $data->getPasswordAdmin();
            $status = $data->getStatus();
            $title = $data->getTitle();
            $isSave = $admin->insert("name , email, password, status, title , description","$name,$email,$password,$status,$title,$description");
            if($isSave){
                $status = true;
            }
        }

        return $status;
    }

    public function update($id,Admin $data = null)
    {
        //name email password status title description token
        $status = false;
        // TODO: Implement update() method.
        if($data != null){
            $admin = new Admin();
            $name = $data->getName();
            $description = $data->getDescription();
            $email = $data->getEmail();
            $password = $data->getPasswordAdmin();
            $status = $data->getStatus();
            $title = $data->getTitle();
            $isSave = $admin->update("name = '$name' , email = '$email', password= '$password', status = '$status', title = '$title' , description = '$description'",$id);
            if($isSave){
                $status = true;
            }
        }

        return $status;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $isDelete = (new Admin())->delete($id);
        return (bool) $isDelete;
    }


}