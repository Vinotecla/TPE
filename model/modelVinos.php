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

    function TaskAdd($a, $b, $c, $d, $e){
        $sentencia = $this->db->prepare("INSERT INTO vinos(id_tipo,nombre,contenido,precio,descripcion) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($a,$b,$c,$d,$e));
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
    function EditVino($a, $b, $c, $d, $e){
        $sentencia = $this->db->prepare("UPDATE `vinos` SET `id_tipo` = $a, `nombre` = $b, `contenido` = $c, `precio` = $d, `descripcion` = $e WHERE `vinos`.`nombre` = $a");
        $sentencia->execute(array($a,$b,$c,$d,$e));
        
    }
    function GetItem($item){
        $sentencia = $this->db->prepare("SELECT * FROM categorias INNER JOIN vinos on vinos.id_tipo = categorias.id_tipo where id_vinos=?");    
        $sentencia->execute(array($item));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
        
    }

}