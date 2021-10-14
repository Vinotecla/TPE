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
        $vino = $this->modelV->taskGet($id);
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->showModificar($vino, $DvCatego);
    }

    function changeOne(){
        $DvCatego = $this->modelCateg->GetCate($_POST['filtros']);
        // $this->modelV->TaskChange($_POST['id'],$DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio']);
        header("location:".BASE_URL."home");
        $this->modelV->TaskChange($_POST['id'],$DvCatego->id_tipo, $_POST['nombre'], $_POST['contenido'], $_POST['precio'], $_POST['descripcion']);
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
                $DbThings = $this->modelV->TaskGetOne($_POST['filtros']);
                $DvCatego = $this->modelCateg->GetCategorias();
                $this->view->showInvited($DbThings, $DvCatego);
            }
        }
        // if ($this->authHelper->isLogIn()) {
        //         $this->ShowHome(sdsd);           
        // } else {
        //         $this->Invited(dsds);
        // }
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
    // function changeCat(){
    //     $DvCatego = $this->modelCateg->UpdateCat();
    //     $this->ShowHome();
    // }
    function addCat(){
        $this->modelCateg->addCategory($_POST['tipo'], $_POST['descripcion']);
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->showCategorias($DvCatego);
    }
    function updateCat(){
        $this->modelCateg->UpdCat($_POST['filtros'], $_POST['descripcion']);
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->showCategorias($DvCatego);
    }
    function deleteCat($id){
        $this->modelCateg->delCat($id);
        // $this->modelV->deletedCat($id);
        $DvCatego = $this->modelCateg->GetCategorias();
        $this->view->showCategorias($DvCatego);
    }
}