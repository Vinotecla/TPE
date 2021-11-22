<?php

class UserModel{

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }
    
    function getUser ($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addUser($a,$b){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email,password) VALUES(?,?)");
        $sentencia->execute(array($a,$b));
    }
    
    function getAlluser(){
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function delUser($email){
        $sentencia = $this->db->prepare("DELETE FROM usuario where email=?");    
        $sentencia->execute(array($email)); 
    }
    function changeStatus($status,$email){
        $sentencia = $this->db->prepare("UPDATE usuario SET Admin=? WHERE email=?");
        $sentencia->execute(array($status,$email)); 
    }
}