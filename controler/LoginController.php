<?php
require_once'model/UserModel.php';
require_once'view/LoginView.php';

class LoginController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }
    
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    function login(){
        $this->view->showLogin();
    }
    
    function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // --.....PRUEBA SIN ENCRIPTAR------

            $password = $_POST['password']; 
     
            // --.....PRUEBA SIN ENCRIPTAR------

            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);
     
            // Si el usuario existe y las contraseñas coinciden
            // if ($user && password_verify($password, $user->password)) {

                // --.....PRUEBA SIN ENCRIPTAR------

                if ($user && $password == $user->password) { 
                    // --.....PRUEBA SIN ENCRIPTAR------

                session_start();
                $_SESSION["email"] = $email;
                
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado".$email.$password);
            }
        }
    }
    
}