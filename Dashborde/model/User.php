<?php 
require_once '../model/Model.php';

class User extends Model {

    // Attrbiute from database
    private $name;
    private $email;
    private $password;
    private $tableRow = "users";

    public function __construct()
    {
        new Model($this->tableRow);
    }
    public function setName($name)
    {
        # code...
    }

        public function setEmail($email)
    {
        # code...
    }

        public function setPassword($password)
    {
        # code...
    }

    //- ------- Geter


        public function getName()
    {
        # code...

        return $this->name;
    }

        public function getEmail()
    {
        # code...
        return $this->email;

    }

        public function getPassword()
    {
        # code...
        return $this->password;

    }
    




}