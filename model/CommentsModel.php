<?php

class CommentsModel{

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2;charset=utf8', 'root', '');
    }

    function getAll($id_vino){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_vino=?');
        $query->execute(array($id_vino));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
 
    function getOne($idComment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
        $query->execute(array($idComment));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getNext($idComment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = (SELECT min(id_comentario) FROM comentarios where id_comentario > ?)');
        $query->execute(array($idComment));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }
    function getPrevious($idComment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = (SELECT max(id_comentario) FROM comentarios where id_comentario < ?)');
        $query->execute(array($idComment));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;

    }

    function checkOne($idcomment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
        $query->execute(array($idcomment));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }

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

    function getCommentsByScore($id_vino, $score){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_vino = ? AND puntaje=?');
        $query->execute(array($id_vino, $score));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
    function OrderAscScore($id_vino){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_vino = ? ORDER BY puntaje DESC');
        $query->execute(array($id_vino));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function OrderDesScore($id_vino){
        $query = $this->db->prepare('SELECT * FROM `comentarios` WHERE id_vino = ? ORDER BY puntaje ASC');
        $query->execute(array($id_vino));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function OrderOlder($id_vino){
        $query = $this->db->prepare('SELECT * FROM `comentarios` WHERE id_vino = ? ORDER BY id_comentario ASC');
        $query->execute(array($id_vino));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function OrderLastest($id_vino){
        $query = $this->db->prepare('SELECT * FROM `comentarios` WHERE id_vino = ? ORDER BY id_comentario DESC');
        $query->execute(array($id_vino));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
}