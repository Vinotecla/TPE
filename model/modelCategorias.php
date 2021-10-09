<?php

class taskCategoria {
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }

    function GetCate($tipo){
        $sentencia = $this->db->prepare( "SELECT * FROM categorias where tipo=?");
        $sentencia->execute(array($tipo));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }


}
