<?php
require_once'libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo', 'Enter');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }

    function showAdmin(){
        header("Location: ".BASE_URL."admin");
    }
    
}
