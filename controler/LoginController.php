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
            $email = $_POST['email'];
            $password =$_POST['password'];

            $user = $this->model->getUser($email);
            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION["email"] = $email;
                $user = $this->authHelper->verifyAdmin($email);
                if($user != null){
                    $this->view->showAdmin();
                }else{
                    $this->view->showHome();
                }
            } else {
                $this->view->showLogin("Access denied");
            }
        }
    }
}