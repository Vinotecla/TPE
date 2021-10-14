<?php

require_once'libs/smarty-3.1.39/libs/Smarty.class.php';

class classView {

    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function ShowBevidas($bevidas, $category){
        
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\bevidas.tpl');
    }

    function showInvited($bevidas, $category){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\bebidasInvited.tpl');
    }


    function showDetail($d){
        $this->smarty->assign('d', $d);
        $this->smarty->display('templates\detailOfProdocts.tpl');
    }

    function showItem($d){
        $this->smarty->assign('d', $d);
        $this->smarty->display('templates\detailOfItem.tpl');
    }

    function showCategoriasPublic($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\categoriasPublic.tpl');
    }
    
    function showCategorias($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\categorias.tpl');
    }

    function showModificar($vino, $category){
        $this->smarty->assign('vino', $vino);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\modificandoTable.tpl');
    }
}
