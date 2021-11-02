<?php

require_once 'libs/Router.php';
require_once 'controler/ApiController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('vinos', 'GET', 'ApiController', 'obtenerVinos');
$router->addRoute('vino/:ID', 'GET', 'ApiController', 'obtenerVino');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
