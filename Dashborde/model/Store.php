<?php
require_once 'Model.php';
require_once 'Category.php';
require_once 'Rating.php';

class Store extends Model{
    private $tableRow = "store";

    private $id;
    private $name;
    private $description;
    private $phone;
    private $logo;
    private $category_id;


    public function __construct()
    {
        new Model($this->tableRow);

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public  function getRating(){
        $rating = new Rating();
        $data = $rating->selectForigen('stor_id',$this->id)->get();

        $sumLike = 0;

        foreach ($data as $item){
            if($item['like'] == 1){
                $sumLike += 1;
            }
        }

        return $sumLike."/".count($data);


    }

    
}