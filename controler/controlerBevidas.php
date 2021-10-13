<?php
require_once'model/modelCategorias.php';
require_once'model/modelVinos.php';
require_once'view/viewBevidas.php';
require_once'Helpers/AuthHelper.php';

class taskControler{

    private $modelCateg;
    private $modelV;
    private $view;
    private $authHelper;

    function __construct(){
        $this->modelCateg = new taskCategoria();
        $this->modelV = new taskVinos();
        $this->view = new classView();
        $this->authHelper = new AuthHelper();
    }

    function ShowHome(){
        $this->authHelper->forceLoggedin();
        $DbThings = $this->modelV->TaskGetAll();
        $this->view->ShowBevidas($DbThings);
    }

    function Invited(){
        $DbThings = $this->modelV->TaskGetAll();
        $this->view->showInvited($DbThings);
    }
    
    function AddVino(){
        $this->authHelper->forceLoggedin();
        $DvCatego = $this->modelCateg->GetCate($_POST['tipo']);
        $this->modelV->TaskAdd($DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio']);
        header("location:".BASE_URL."home");
    }

    function modificar($id){
        $vino = $this->modelV->taskGet($id);
        $this->view->showModificar($vino);
    }

    function changeOne(){
        $DvCatego = $this->modelCateg->GetCate($_POST['tipo']);
        $this->modelV->TaskChange($_POST['id'],$DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio']);
        header("location:".BASE_URL."home");
    }

    function DeleteVino($id){
        $this->authHelper->forceLoggedin();
        $this->modelV->TaskDelete($id);
        header("location:".BASE_URL."home");
    }

    function filtrar(){
        if ($this->authHelper->isLogIn()) {
            if ($_POST['filtros'] == "Todo") {
                $this->ShowHome();
            }else{
                $DbThings = $this->modelV->TaskGetOne($_POST['filtros']);
                $this->view->ShowBevidas($DbThings);
            }
        }else {
            if ($_POST['filtros'] == "Todo") {
                $this->Invited();
            }else{
                $DbThings = $this->modelV->TaskGetOne($_POST['filtros']);
                $this->view->showInvited($DbThings);
            }
        }
        // if ($this->authHelper->isLogIn()) {
        //         $this->ShowHome(sdsd);           
        // } else {
        //         $this->Invited(dsds);
        // }
    }

    function detailOfType($tipo){
        $DvCatego = $this->modelCateg->GetCate($tipo);
        $this->view->showDetail($DvCatego);
    }

    
}