<?php

require_once'libs/smarty-3.1.39/libs/Smarty.class.php';
class CategoriesView{
    
    function __construct(){
        $this->smarty = new Smarty();
    }    

    function showDetail($categorias){
        $this->smarty->assign('d', $categorias);
        $this->smarty->display('templates\detailOfProdocts.tpl');
    }

    function showCategoriasPublic($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\categoriasPublic.tpl');
    }
    
    function showCategorias($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates\categorias.tpl');
    }
}
