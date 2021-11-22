<?php

require_once'libs/smarty-3.1.39/libs/Smarty.class.php';
class CategoriesView{
    
    function __construct(){
        $this->smarty = new Smarty();
    }    

    function showDetail($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/detailOfCategorias.tpl');
    }

    function showCategoriasPublic($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/invited/categoriasPublic.tpl');
    }

    function showCategoriasUser($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/users/categoriasUsers.tpl');
    }
    
    function showCategoriasAdmin($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/admin/categoriasAdmin.tpl');
    }
}
