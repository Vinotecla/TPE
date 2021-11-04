<?php
require_once'model/UserModel.php';
require_once'Helpers/AuthHelper.php';
require_once'controler/VinoController.php';
require_once'view/RegisterView.php';

class RegisterController{
    private $model;
    private $view;
    private $vinoController;
    private $authHelper;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new RegisterView();
        $this->vinoController = new VinoController();
        $this->authHelper = new AuthHelper();
    }
    
    function Register(){
        if($this->authHelper->isLogIn()){
            $this->vinoController->ShowHome();
        }else{
            $this->view->ShowRegister();
        }
    }

    function newUser(){
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->model->addUser($email, $password);
        session_start();
        $_SESSION["email"] = $email;
        header("location:".BASE_URL."home");
    }

    function deleteUser($email){
        $this->model->delUser($email);
        header("location:".BASE_URL."admin");
    }

    function permissionChange($email){
        $user = $this->model-> getUser($email);
        if($user->Admin ==!null){
            $status = null;
            $this->model->changeStatus($status, $email);
        }
        else{
            $status = !null;
            $this->model->changeStatus($status, $email);
        }
        header("location:".BASE_URL."admin");
    }
}