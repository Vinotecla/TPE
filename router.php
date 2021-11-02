<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once'controler/VinoController.php';
require_once'controler/CategoryController.php';
require_once'controler/LoginController.php';
require_once'controler/RegisterController.php';

$categoryController = new CategoryController();
$vinoController = new VinoController();
$loginController = new LoginController();
$registerController = new RegisterController();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}else{
    $action = "home";
}

$param = explode('/', $action);

switch ($param[0]) {
    case 'logout':
        echo $loginController ->logout();
        break;
    case 'verify':
        echo $loginController ->verifyLogin();
        break;
    case 'login':
        echo $loginController ->login();
        break;
    case 'adduser':
        echo $registerController ->newUser();
        break;
    case 'register':
        echo $registerController ->Register();
        break;
    case 'invitado':
        echo $vinoController ->Invited();
        break;
    case 'home':
        echo $vinoController ->ShowHome();
        break;
    case 'add':
        echo $vinoController ->AddVino();
        break;
    case 'delete':
        echo $vinoController ->DeleteVino($param[1]);
        break;
    case 'filtro':
        echo $vinoController ->filtrarVino(); 
        break;
    case 'change':
        echo $vinoController -> changeOneVino();
        break;
    case 'item':
        echo $vinoController -> DetailOfVino($param[1]);
        break;
    case 'modificar':
        echo $vinoController -> showModificarVino($param[1]);
        break;
    case 'variedad':
        echo $vinoController ->variedadVino($param[1]); 
    break;
    case 'description':
        echo $categoryController -> detailOfCatego($param[1]);
        break;
    case 'categorias':
        echo $categoryController -> detailCategorias();
        break;
    case 'addcat':
        echo $categoryController -> addCat();
        break;
    case 'updatecat':
        echo $categoryController -> updateCat();
        break;
    case 'deletecat':
        echo $categoryController -> deleteCat($param[1]);
        break;
    case 'admin':
        echo $vinoController -> Admin();
        break;
    case 'deleteUser':
        echo $registerController -> deleteUser($param[1]);
        break;
    case 'changePermission':
        echo $registerController -> permissionChange($param[1]);
        break;
    default:
        break;
}