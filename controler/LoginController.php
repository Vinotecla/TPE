<?php
require_once'model/UserModel.php';
require_once'Helpers/AuthHelper.php';
require_once'controler/VinoController.php';
require_once'view/LoginView.php';

class LoginController{
    private $model;
    private $view;
    private $authHelper;
    private $controler;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->authHelper = new AuthHelper();
        $this->controler = new VinoController();
    }
    
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    function login(){
        if($this->authHelper->isLogIn()){
            $this->controler->ShowHome();
        }else{
            $this->view->showLogin();
        }
    }
    
    function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            //Obtengo usuario y contraseña por post
            $email = $_POST['email'];
            $password =$_POST['password'];

            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION["email"] = $email;
                $this->verifyAdmin();
                // $this->view->showHome();
            } else {
                $this->view->showLogin("Access denied");
            }
        }
    }

    function verifyAdmin(){
        $email = $_POST['email'];
        $user = $this->model->getUser($email);
        if($user->Admin == !null){
            $this->view->showAdmin();
        }
        else{
            $this->view->showHome();
        }
    }
}