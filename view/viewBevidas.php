<?php

require_once'libs/smarty-3.1.39/libs/Smarty.class.php';

class classView {

    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function ShowBevidas($bevidas){
        
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->display('templates\bevidas.tpl');
    }

    function showInvited($bevidas){
        $this->smarty->assign('bevidas', $bevidas);
        $this->smarty->display('templates\bebidasInvited.tpl');
    }


    function showDetail($d){
        $this->smarty->assign('d', $d);
        $this->smarty->display('templates\detailOfProdocts.tpl');
    }

    function showModificar($vino){
        $this->smarty->assign('vino', $vino);
        $this->smarty->assign('myOptions', array(
            "Malbec" => 'Malbec',
            "Blanco" => 'Blanco',
            "Cabernet" => 'Cabernet',
            "Rosado" => 'Rosado'));
        $this->smarty->assign('mySelect', $vino->tipo);
        $this->smarty->display('templates\modificandoTable.tpl');
    }
}
