<?php 

class User extends Model {

    // Attrbiute from database
    private $name;
    private $email;
    private $password;

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
    }

        public function getEmail()
    {
        # code...
    }

        public function getPassword()
    {
        # code...
    }
    

    private $tableRow = "users";

    public function __construct()
    {
        new Model($this->tableRow);
    }


}