<?php
require_once './model/VinosModel.php';
require_once './view/ApiView.php';
require_once 'VinoController.php';

class ApiController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new VinosModel();
        $this->view = new ApiView();
    }

    function obtenerVinos(){
        $tareas = $this->model->GetVinosYCategoriasTipo();
        return $this->view->response($tareas, 200);
    }

    function obtenerVino($params = []){
        $idTarea = $params[":ID"];
        $tarea = $this->model->GetVinoByID($idTarea);
        return $this->view->response($tarea, 200);
    }

}
