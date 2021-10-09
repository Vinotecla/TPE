<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once'controler/controlerBevidas.php';
require_once'controler/LoginController.php';
require_once'controler/RegisterController.php';

$controler = new taskControler();
$loginController = new LoginController();
$registerController = new RegisterController();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}else{
    $action = "home";
}

$param = explode('/', $action);

switch ($param[0]) {
    case 'invitado':
        echo $controler ->Invited();
        break;
    case 'logout':
        echo $loginController ->logout();
        break;
    case 'adduser':
        echo $registerController ->newUser();
        break;
    case 'register':
        echo $registerController ->Register();
        break;
    case 'verify':
        echo $loginController ->verifyLogin();
        break;
    case 'login':
        echo $loginController ->login();
        break;
    case 'home':
        echo $controler ->ShowHome();
        break;
    case 'add':
        echo $controler ->AddVino();
        break;
    case 'delete':
        echo $controler ->DeleteVino($param[1]);
        break;
    case 'filtro':
        echo $controler ->filtrar(); 
        break;
    default:
        break;
}