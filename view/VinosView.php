<?php

require_once'libs/smarty-3.1.39/libs/Smarty.class.php';

class VinosView {

    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function ShowBevidas($bevidas, $category){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\bevidas.tpl');
    }
    
    function showAdmin($bevidas, $category, $users){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates\admin.tpl');
    }

    function showInvited($bevidas, $category){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\bebidasInvited.tpl');
    }

    function showModificar($vino, $category){
        $this->smarty->assign('vino', $vino);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\modificandoTable.tpl');
    }
    
    function showItem($vinoYcatego){
        $this->smarty->assign('d', $vinoYcatego);
        $this->smarty->display('templates\detailOfItem.tpl');
    }
    function showItemAdmin($vinoYcatego){
        $this->smarty->assign('d', $vinoYcatego);
        $this->smarty->display('templates\detailOfItemAdmin.tpl');
    }
    function showItemInvited($vinoYcatego){
        $this->smarty->assign('d', $vinoYcatego);
        $this->smarty->display('templates\detailOfItemInvited.tpl');
    }
    
}
