<?php

class VinosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }

    function AddVino($a, $b, $c, $d){
        $sentencia = $this->db->prepare("INSERT INTO vino(id_tipo,nombre,contenido,precio) VALUES(?,?,?,?)");
        $sentencia->execute(array($a,$b,$c,$d));
    }

    function DeleteVino($id){
        $sentencia = $this->db->prepare("DELETE FROM vino where id_vinos=?");    
        $sentencia->execute(array($id));    
    }

    function ChangeOneVino($id,$tipo,$nombre,$contenido,$precio){
        $sentencia = $this->db->prepare("UPDATE vino SET id_tipo=?,nombre=?,contenido=?,precio=? WHERE id_vinos=?"); 
        $sentencia->execute(array($tipo,$nombre,$contenido,$precio,$id));
    }

    

    function GetVinoByID($id){
        $sentencia = $this->db->prepare("SELECT * FROM vino WHERE id_vinos = ?"); 
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetVinosYCategoriasByIdVino($id){
        $sentencia = $this->db->prepare("SELECT * FROM vino INNER JOIN categoria on vino.id_tipo = categoria.id_tipo WHERE id_vinos = ?"); 
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetVinosYCategoriasTipo (){
        $sentencia = $this->db->prepare( "SELECT vino.*, categoria.tipo FROM categoria INNER JOIN vino on vino.id_tipo = categoria.id_tipo");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetOneVinoByTipo($tipo){
        $sentencia = $this->db->prepare("SELECT * FROM categoria INNER JOIN vino on vino.id_tipo = categoria.id_tipo where tipo=?");    
        $sentencia->execute(array($tipo));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    // function deletedCat($id){
    //     $sentencia = $this->db->prepare("DELETE FROM vino where id_tipo=?");
    //     $sentencia->execute(array($id));       
    // }
}