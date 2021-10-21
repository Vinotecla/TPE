<?php
require_once'model/CategoryModel.php';
require_once'model/VinosModel.php';
require_once'Helpers/AuthHelper.php';
require_once'view/VinosView.php';

class VinoController{
    private $modelCateg;
    private $modelV;
    private $view;
    private $authHelper;

    function __construct(){
        $this->modelCateg = new CategoryModel();
        $this->modelV = new VinosModel();
        $this->view = new VinosView();
        $this->authHelper = new AuthHelper();
    }

    function ShowHome(){
        $this->authHelper->forceLoggedin();
        $DbThings = $this->modelV->GetVinosYCategoriasTipo();
        $DvCatego = $this->modelCateg->GetCategoriaTipos();
        $this->view->ShowBevidas($DbThings, $DvCatego);
    }

    function Invited(){
        $DbThings = $this->modelV->GetVinosYCategoriasTipo();
        $DvCatego = $this->modelCateg->GetCategoriaTipos();
        $this->view->showInvited($DbThings, $DvCatego);
    }
    
    function AddVino(){
        $this->authHelper->forceLoggedin();
        $DvCatego = $this->modelCateg->GetCate($_POST['filtros']);
        $this->modelV->AddVino($DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio']);
        header("location:".BASE_URL."home");
    }

    function showModificarVino($id){
        $this->authHelper->forceLoggedin();
        $vino = $this->modelV->GetVinoByID($id);
        $DvCatego = $this->modelCateg->GetCategoriaTipos();
        $this->view->showModificar($vino, $DvCatego);
    }

    function changeOneVino(){
        $this->authHelper->forceLoggedin();
        $DvCatego = $this->modelCateg->GetCate($_POST['filtros']);
        header("location:".BASE_URL."home");
        $this->modelV->ChangeOneVino($_POST['id'],$DvCatego->id_tipo, $_POST['nombre'], $_POST['contenido'], $_POST['precio']);
    }

    function DeleteVino($id){
        $this->authHelper->forceLoggedin();
        $this->modelV->DeleteVino($id);
        header("location:".BASE_URL."home");
    }

    function DetailOfVino($item){
        $vino = $this->modelV->GetVinosYCategoriasByIdVino($item);
        $this->view->showItem($vino);
    }

    function filtrarVino(){
        if ($this->authHelper->isLogIn()) {
            if ($_POST['filtros'] == "Todo") {
                $this->ShowHome();
            }else{
                $DbThings = $this->modelV->GetOneVinoByTipo($_POST['filtros']);
                $DvCatego = $this->modelCateg->GetCategoriaTipos();
                $this->view->ShowBevidas($DbThings, $DvCatego);
            }
        }else {
            if ($_POST['filtros'] == "Todo") {
                $this->Invited();
            }else{
                var_dump("horgo");
                $DbThings = $this->modelV->GetOneVinoByTipo($_POST['filtros']);
                $DvCatego = $this->modelCateg->GetCategoriaTipos();
                $this->view->showInvited($DbThings, $DvCatego);
                
            }
        }
    }
}