<?php

require_once 'libs/Router.php';
require_once 'controler/ApiController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios/:ID', 'GET', 'ApiController', 'getComments');
$router->addRoute('comentarios/puntaje/:ID/:IDP', 'GET', 'ApiController', 'filterComments');
$router->addRoute('comentarios/orden/:ID/:IDO', 'GET', 'ApiController', 'orderComments');
$router->addRoute('comentario/:ID', 'GET', 'ApiController', 'getComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiController', 'deleteComment');
$router->addRoute('comentarios', 'POST', 'ApiController', 'insertComment');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
