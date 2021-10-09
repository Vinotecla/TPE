<?php

class AuthHelper{

    function __construct()
    {

    }
    function checkLoggedin(){
        session_start();
        if(!isset($_SESSION["email"])){
            header("Location: ".BASE_URL."login");
        }

    }
}