<?php
session_start();

require_once '../model/Admin.php';
class Auth {


    public  function login($email,$pass){
        $admin = new Admin();
        $data = $admin->selectWithEmail($email)->get();

        if(count($data) > 0){
            if($data[0]['password'] == $pass){
                $_SESSION['userInfo'] = $data[0];
            }else{
                $_SESSION['error_register'] = "Your Password Is Error";
            }
        }else{
            $_SESSION['error_register'] = "You are not register !";
        }
    }

    public  function logout(){
        session_destroy();
    }


    public function checkAuth(){
        if(empty($_SESSION['userInfo'])){
            header('Location:login.php');
        }else{
            if($_SESSION['userInfo']['status'] != 1){
                header('Location:block.php');
            }
        }
    }


}
