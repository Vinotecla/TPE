<?php
require_once'model/UserModel.php';

class AuthHelper{
    private $modelUser;

    function __construct(){
        $this->modelUser = new UserModel();
    }

    function forceLoggedin(){
        if(!$this->isLogIn()){
            header("Location: ".BASE_URL."login");
        }
    }

    function isLogIn(){
        if(!isset($_SESSION)) {
            session_start();
        }
        return isset($_SESSION["email"]);
    }
    
    function verifyAdmin(){
        $email = $_SESSION['email'];
        $user = $this->modelUser->getUser($email);
        if($user->Admin == !null){
            return !null;
        }else{
            return null;
        }
    }
}