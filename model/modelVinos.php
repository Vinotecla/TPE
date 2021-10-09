<?php

class taskVinos{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }

    function TaskGetAll (){
        $sentencia = $this->db->prepare( "SELECT * FROM categorias INNER JOIN vinos on vinos.id_tipo = categorias.id_tipo");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function TaskAdd($a, $b, $c, $d){
        $sentencia = $this->db->prepare("INSERT INTO vinos(id_tipo,nombre,contenido,precio) VALUES(?,?,?,?)");
        $sentencia->execute(array($a,$b,$c,$d));
    }

    function TaskDelete($id){
        $sentencia = $this->db->prepare("DELETE FROM vinos where id_vinos=?");    
        $sentencia->execute(array($id));    
    }

    function TaskGetOne($tipo){
        $sentencia = $this->db->prepare("SELECT * FROM categorias INNER JOIN vinos on vinos.id_tipo = categorias.id_tipo where tipo=?");    
        $sentencia->execute(array($tipo));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


}