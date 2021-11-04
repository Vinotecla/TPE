<?php
require_once'model/CategoryModel.php';
require_once'model/VinosModel.php';
require_once'model/UserModel.php';
require_once'Helpers/AuthHelper.php';
require_once'view/VinosView.php';

class VinoController{
    private $modelCateg;
    private $modelV;
    private $modelUser;
    private $view;
    private $authHelper;
    

    function __construct(){
        $this->modelCateg = new CategoryModel();
        $this->modelV = new VinosModel();
        $this->modelUser = new UserModel();
        $this->view = new VinosView();
        $this->authHelper = new AuthHelper();
        
    }

    function ShowHome(){
        $this->authHelper->forceLoggedin();
        $DbThings = $this->modelV->GetVinosYCategoriasTipo();
        $DvCatego = $this->modelCateg->GetCategoriaTipos();
        if($this->authHelper->verifyAdmin()){
            $DbUser = $this->modelUser->getAlluser();
            $this->view->showAdmin($DbThings, $DvCatego, $DbUser);
        }else{
            $this->view->ShowBevidas($DbThings, $DvCatego);
        }
       
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
        if($this->authHelper->isLogIn()){
            if($this->authHelper->verifyAdmin()){
                $vino = $this->modelV->GetVinosYCategoriasByIdVino($item);
                $this->view->showItemAdmin($vino);
            }else{
                $vino = $this->modelV->GetVinosYCategoriasByIdVino($item);
                $this->view->showItem($vino);
            }
        }else{
            $vino = $this->modelV->GetVinosYCategoriasByIdVino($item);
            $this->view->showItemInvited($vino);
        }

    }

    function filtrarVino(){
        if ($this->authHelper->isLogIn()) {
           if (!isset($_POST['filtros'])){
            $this->ShowHome();
           }
            else if ($_POST['filtros'] == "Todo") {
                header("location:".BASE_URL."variedad/".$_POST['filtros']);
            }
            else {
                header("location:".BASE_URL."variedad/".$_POST['filtros']);
            }
        } else {
            if ($_POST['filtros'] == "Todo") {
                header("location:".BASE_URL."variedad/".$_POST['filtros']);
            }
            else{
                header("location:".BASE_URL."variedad/".$_POST['filtros']);
            }
        }
    }

    function variedadVino($tipo){
        if ($this->authHelper->isLogIn()){
            if($tipo == 'Todo'){
                $this->ShowHome();
            }
            else{
                $DbThings = $this->modelV->GetOneVinoByTipo($tipo);
                $DvCatego = $this->modelCateg->GetCategoriaTipos();
                $this->view->ShowBevidas($DbThings, $DvCatego);
            }
        }
        else{
            if($tipo == 'Todo'){
                $this->Invited();
            }
            else{
                $DbThings = $this->modelV->GetOneVinoByTipo($tipo);
                $DvCatego = $this->modelCateg->GetCategoriaTipos();
                $this->view->showInvited($DbThings, $DvCatego);
            }
        }
    }
}