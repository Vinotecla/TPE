<?php
require_once'model/modelCategorias.php';
require_once'view/viewCatego.php';

class contCatego{

    private $model;
    private $view;
    
    function __construct(){
        $this->model = new taskCategoria();
        $this->view = new viewCatego();
    }

    function ShowCatego(){
        // $this->authHelper->forceLoggedin();
        $DbThings = $this->model->GetAllCate();
        $this->view->ShowCatego($DbThings);
    }

    function AddCatego(){
        // $this->authHelper->forceLoggedin();
        $this->model->TaskAdd($_POST['tipo'],$_POST['descripcion']);
        header("location:".BASE_URL."category");
    }

    function modificar($id){
        $vino = $this->model->TaskChange($id);
        $this->view->showModificar($vino);
    }

    function changeOne(){
        $DvCatego = $this->modelCateg->GetCate($_POST['tipo']);
        $this->model->TaskChange($_POST['id'],$DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio']);
        header("location:".BASE_URL."home");
    }

    function DeleteCatego($id){
        // $this->authHelper->forceLoggedin();
        $this->model->TaskDelete($id);
        header("location:".BASE_URL."category");
    }
}
