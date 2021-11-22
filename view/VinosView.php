<?php

require_once'libs/smarty-3.1.39/libs/Smarty.class.php';

class VinosView {

    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function showAdmin($bevidas, $category, $users){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/admin/bebidasAdmin.tpl');
    }

    function showItemAdmin($bevidasYcategory){
        $this->smarty->assign('d', $bevidasYcategory);
        $this->smarty->display('templates/admin/detailOfItemAdmin.tpl');
    }

    function ShowBevidas($bevidas, $category){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/users/bevidasUsuario.tpl');
    }
    
    function showItem($bevidasYcategory){
        $this->smarty->assign('d', $bevidasYcategory);
        $this->smarty->display('templates/users/detailOfItemUsuario.tpl');
    }

    function showInvited($bevidas, $category){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/invited/bebidasInvited.tpl');
    }

    function showItemInvited($bevidasYcategory){
        $this->smarty->assign('d', $bevidasYcategory);
        $this->smarty->display('templates/invited/detailOfItemInvited.tpl');
    }

    function showModificar($bevidas, $category){
        $this->smarty->assign('vino', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/admin/modificandoBebidas.tpl');
    }
    
}
