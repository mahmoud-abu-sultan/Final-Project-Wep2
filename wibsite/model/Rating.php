<?php
require_once 'Model.php';

class Rating extends Model{
    private $tableRow = "rating";
    private  $id;
    private $like;
    private $dislike;
    private $users_id;
    private $stor_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getLike()
    {
        return $this->like;
    }

    /**
     * @param mixed $like
     */
    public function setLike($like)
    {
        $this->like = $like;
    }

    /**
     * @return mixed
     */
    public function getDislike()
    {
        return $this->dislike;
    }

    /**
     * @param mixed $dislike
     */
    public function setDislike($dislike)
    {
        $this->dislike = $dislike;
    }

    /**
     * @return mixed
     */
    public function getUsersId()
    {
        return $this->users_id;
    }

    /**
     * @param mixed $users_id
     */
    public function setUsersId($users_id)
    {
        $this->users_id = $users_id;
    }

    /**
     * @return mixed
     */
    public function getStorId()
    {
        return $this->stor_id;
    }

    /**
     * @param mixed $stor_id
     */
    public function setStorId($stor_id)
    {
        $this->stor_id = $stor_id;
    }
    public function __construct()
    {
        new Model($this->tableRow);

    }


}