<?php
require_once 'Model.php';


class User extends Model {

    // Attrbiute from database
    private $name;
    private $email;
    private $password_user;
    private $tableRow = "users";

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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->password_user;
    }

    /**
     * @param mixed $password_user
     */
    public function setPasswordUser($password_user)
    {
        $this->password_user = $password_user;
    }







}