<?php

// require_once'model/modelCategorias.php';
// require_once'view/viewBevidas.php';
// require_once'Helpers/AuthHelper.php';

// class ContCategorias{

//     function __construct(){
//         $this->modelCateg = new taskCategoria();
//         $this->view = new classView();
//         $this->viewCatego = new classView();
//         $this->authHelper = new AuthHelper();
//     }

//     function detailOfType($tipo){
//         $DvCatego = $this->modelCateg->GetCate($tipo);
//         $this->view->showDetail($DvCatego);
//     }

//     function itemDetail($item){
//         $vino = $this->modelV->taskGet($item);
//         $this->view->showItem($vino);
//     }

//     function addCat(){
//         $this->authHelper->forceLoggedin();
//         $this->modelCateg->addCategory($_POST['tipo'], $_POST['descripcion']);
//         header("location:".BASE_URL."categorias");
//     }

//     function updateCat(){
//         $this->authHelper->forceLoggedin();
//         $this->modelCateg->UpdCat($_POST['tipo'], $_POST['descripcion']);
//         header("location:".BASE_URL."categorias");
//     }

//     function deleteCat($id){
//         $this->authHelper->forceLoggedin();
//         // $this->modelV->deletedCat($id);
//         $this->modelCateg->delCat($id);
//         header("location:".BASE_URL."categorias");
//     }

//     function detailCategorias(){
//         if ($this->authHelper->isLogIn()) {
//             $DvCatego = $this->modelCateg->GetCategorias();
//             $this->view->showCategorias($DvCatego);
//         }else{
//             $DvCatego = $this->modelCateg->GetCategorias();
//             $this->view->showCategoriasPublic($DvCatego);
//         }
//     }
// }
