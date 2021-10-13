<?php

class AuthHelper{

    function __construct(){}

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
}