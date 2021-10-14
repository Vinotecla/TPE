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
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->ShowBevidas($DbThings, $DvCatego);
    }

    function Invited(){
        $DbThings = $this->modelV->TaskGetAll();
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->showInvited($DbThings, $DvCatego);
    }
    
    function AddVino(){
        $this->authHelper->forceLoggedin();
        $DvCatego = $this->modelCateg->GetCate($_POST['filtros']);
        $this->modelV->TaskAdd($DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio']);
        header("location:".BASE_URL."home");
    }

    function modificar($id){
        $this->authHelper->forceLoggedin();
        $vino = $this->modelV->taskGet($id);
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->showModificar($vino, $DvCatego);
    }

    function changeOne(){
        $this->authHelper->forceLoggedin();
        $DvCatego = $this->modelCateg->GetCate($_POST['filtros']);
        header("location:".BASE_URL."home");
        $this->modelV->TaskChange($_POST['id'],$DvCatego->id_tipo, $_POST['nombre'], $_POST['contenido'], $_POST['precio']);
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
                $DvCatego = $this->modelCateg->GetCategorias();
                $this->view->ShowBevidas($DbThings, $DvCatego);
            }
        }else {
            if ($_POST['filtros'] == "Todo") {
                $this->Invited();
            }else{
                var_dump("horgo");
                $DbThings = $this->modelV->TaskGetOne($_POST['filtros']);
                $DvCatego = $this->modelCateg->GetCategorias();
                $this->view->showInvited($DbThings, $DvCatego);
            }
        }
    }
    function detailCategorias(){
        if ($this->authHelper->isLogIn()) {
            $DvCatego = $this->modelCateg->GetCategorias();
            $this->view->showCategorias($DvCatego);
        }else{
            $DvCatego = $this->modelCateg->GetCategorias();
            $this->view->showCategoriasPublic($DvCatego);
        }
    }

    function detailOfType($tipo){
        $DvCatego = $this->modelCateg->GetCate($tipo);
        $this->view->showDetail($DvCatego);
    }

    function itemDetail($item){
        $vino = $this->modelV->taskGet($item);
        $this->view->showItem($vino);
    }

    function addCat(){
        $this->authHelper->forceLoggedin();
        $this->modelCateg->addCategory($_POST['tipo'], $_POST['descripcion']);
        header("location:".BASE_URL."categorias");
    }

    function updateCat(){
        $this->authHelper->forceLoggedin();
        $this->modelCateg->UpdCat($_POST['tipo'], $_POST['descripcion']);
        header("location:".BASE_URL."categorias");
    }

    function deleteCat($id){
        $this->authHelper->forceLoggedin();
        $this->modelCateg->delCat($id);
        header("location:".BASE_URL."categorias");
    }
}