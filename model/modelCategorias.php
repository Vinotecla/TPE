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
    function GetCategorias(){
        $sentencia = $this->db->prepare( "SELECT * FROM categorias");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function addCategory($a,$b){
        $sentencia = $this->db->prepare("INSERT INTO categorias(tipo, descripcion) VALUES(?,?)");
        $sentencia->execute(array($a,$b));
    }
    function UpdCat($tipo, $descripcion){
        $sentencia = $this->db->prepare("UPDATE categorias SET descripcion=? WHERE tipo=?"); 
        $sentencia->execute(array($descripcion, $tipo));
    }
    function delCat($id){
        $sentencia = $this->db->prepare("DELETE FROM categorias where id_tipo=?");    
        $sentencia->execute(array($id)); 
    }
}