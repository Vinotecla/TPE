<?php

class CommentsModel{

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_vino=?');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function getOne($id_vino){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_vino = ?');
        $query->execute(array($id_vino));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    // ---------------------------------------
    function checkOne($idcomment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
        $query->execute(array($idcomment));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }
// ---------------------------------------
    function delete($idComment){
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $query->execute(array($idComment));
    }

    function insert($comment, $score, $id_vino){
        $query = $this->db->prepare("INSERT INTO comentarios(comentario, puntaje, id_vino) VALUES(?, ?,?)");
        $query->execute(array($comment,$score, $id_vino));
        return $this->db->lastInsertId();
    }

    function update($id, $comment, $score){
        $sentencia = $this->db->prepare("UPDATE comentarios SET comentario=?, puntaje=?, WHERE id_comentario=?");
        $sentencia->execute(array($comment, $score, $id));
    }

}