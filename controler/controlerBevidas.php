<?php
require_once'model/modelCategorias.php';
require_once'model/modelVinos.php';
require_once'view/viewBevidas.php';
require_once'view/LoginView.php';
require_once'controler/LoginController.php';
require_once'Helpers/AuthHelper.php';


class taskControler{

    private $modelV;
    private $view;
    private $loginView;
    private $loginController;
    private $authHelper;

    function __construct(){
        $this->modelCateg = new taskCategoria();
        $this->modelV = new taskVinos();
        $this->view = new classView();
        $this->loginView = new LoginView();
        $this->loginController = new LoginController();
        $this->authHelper = new AuthHelper();
    }

    function ShowHome(){
        $this->authHelper->checkLoggedin();

        $DbThings = $this->modelV->TaskGetAll();
        $this->view->ShowBevidas($DbThings);
    }
    function Invited(){
        $DbThings = $this->modelV->TaskGetAll();
        $this->view->showInvited($DbThings);
    }
    
    function AddVino(){
        $this->authHelper->checkLoggedin();
        $DvCatego = $this->modelCateg->GetCate($_POST['tipo']);
        $this->modelV->TaskAdd($DvCatego->id_tipo,$_POST['nombre'],$_POST['contenido'],$_POST['precio'],$_POST['descripcion']);
        header("location:".BASE_URL."home");
    }

    function DeleteVino($id){
        $this->modelV->TaskDelete($id);
        header("location:".BASE_URL."home");
    }

    function filtrar(){
        $this->authHelper->checkLoggedin();
        if ($_POST['filtros'] == "Todo") {
            header("location:".BASE_URL."home");
        }else {
            $DbThings = $this->modelV->TaskGetOne($_POST['filtros']);
            $this->view->ShowBevidas($DbThings);
        }
        
    }
    function categoryFilter($category){
        $DvCategory = $this->modelCateg->GetCategory($category);
        $this->view->showCategory($DvCategory);
    }
    function itemFilter($id){
        $item = $this->modelV->GetItem($id);
        $this->view->showItem($item);
    }
}