<?php
require_once'model/UserModel.php';
require_once'view/RegisterView.php';
require_once'controler/controlerVinos.php';
require_once'Helpers/AuthHelper.php';

class RegisterController{
    private $model;
    private $view;
    private $controler;
    private $authHelper;
    function __construct(){
        $this->model = new UserModel();
        $this->view = new RegisterView();
        $this->controler = new taskControler();
        $this->authHelper = new AuthHelper();
    }
    
    function Register(){
        if($this->authHelper->isLogIn()){
            $this->controler->ShowHome();
        }else{
            $this->view->ShowRegister();
        }
        
    }

    function newUser(){
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // ---------------PRUEBA SIN ENCRIPTAR---------------
        // $password = $_POST['password'];
        // ---------------PRUEBA SIN ENCRIPTAR---------------

        $this->model->addUser($email, $password);
        header("location:".BASE_URL."login");
    }
}