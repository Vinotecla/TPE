<?php
require_once'model/UserModel.php';
require_once'view/RegisterView.php';

class RegisterController{
    
    function __construct(){
        $this->model = new UserModel();
        $this->view = new RegisterView();
    }
    
    function Register(){
        $this->view->ShowRegister();
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