<?php 
require_once '../model/Model.php';
class Store extends Model{
    private $tableRow = "store";

    private $name;
    private $description;
    private $phone;
    private $logo;
    private $category_id;


    public function __construct()
    {
        new Model($this->tableRow);

    }

    
    public function setName($name)
    {
        # code...
    }

        public function setDescription($description)
    {
        # code...
    }

        public function setPhone($phone)
    {
        # code...
    }

        public function setLogo($logo)
    {
        # code...
    }

        public function setCategoryId($category_id)
    {
        # code...
    }

    //-------- Geter -------------

    public function getName(){
        return $this->name;
    }


        public function getDescription()
    {
        # code...
        return $this->description;

    }

        public function getPhone()
    {
        # code...
        return $this->phone;

    }

        public function getLogo()
    {
        # code...
        return $this->logo;

    }

        public function getCategoryId()
    {
        # code...
        return $this->category_id;

    }
    
}