<?php
session_start();

require_once 'model/User.php';
class Auth {


    public  function login($email,$pass){
        $admin = new Admin();
        $data = $admin->selectWithEmail($email)->get();

        if(count($data) > 0){
            if($data[0]['password'] == $pass){
                $_SESSION['user'] = $data[0];
            }else{
                $_SESSION['error_register'] = "Your Password Is Error";
            }
        }else{
            $_SESSION['error_register'] = "You are not register !";
        }
    }
    public  function loginUser($email,$pass){
        $user = new User();
        $data = $user->selectWithEmail($email)->get();

        if(count($data) > 0){
            if($data[0]['password'] == $pass){
                $_SESSION['user'] = $data[0];
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
        if(empty($_SESSION['user'])){
            header('Location:login.php');
        }
    }


}
