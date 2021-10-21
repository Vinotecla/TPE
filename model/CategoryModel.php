<?php

class CategoryModel {

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }

    function addCategory($a,$b){
        $sentencia = $this->db->prepare("INSERT INTO categoria(tipo, descripcion) VALUES(?,?)");
        $sentencia->execute(array($a,$b));
    }

    function UpdCat($tipo, $descripcion){
        $sentencia = $this->db->prepare("UPDATE categoria SET descripcion=? WHERE tipo=?"); 
        $sentencia->execute(array($descripcion, $tipo));
    }

    function delCat($id){
        $sentencia = $this->db->prepare("DELETE FROM categoria where id_tipo=?");    
        $sentencia->execute(array($id)); 
    }
    
    

    function GetCategoriaTipos(){
        $sentencia = $this->db->prepare( "SELECT categoria.tipo FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetAllInCategorias(){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCate($tipo){
        $sentencia = $this->db->prepare( "SELECT categoria.id_tipo FROM categoria where tipo=?");
        $sentencia->execute(array($tipo));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetCategoriasByTipo($tipo){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria where tipo=?");
        $sentencia->execute(array($tipo));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    












    
}