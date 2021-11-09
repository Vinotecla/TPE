<?php
require_once './model/CommentsModel.php';
require_once './view/ApiView.php';
require_once 'VinoController.php';

class ApiController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new CommentsModel();
        $this->view = new ApiView();
    }

    function getComments($params = null){
        $id_vino = $params[":ID"];
        $comments = $this->model->getAll($id_vino);
        return $this->view->response($comments, 200);
    }

    function getComment($params = null){
        $idComment = $params[":ID"];
        $comment = $this->model->getOne($idComment);
        return $this->view->response($comment, 200);
    }

    function deleteComment($params = null) {
        $idComment = $params[":ID"];
        $comment = $this->model->checkOne($idComment);
        if ($comment) {
            $this->model->delete($idComment);
            $check = $this->model->checkOne($idComment);
            if($check){
                return $this->view->response("El comentario con el id=$idComment no existe", 404);
            }
            
        } else {
            return $this->view->response("El comentario con el id=$idComment fue borrado", 200);
        }
    }

    function insertComment() {
        $body = $this->getBody();
        $id = $this->model->insert($body->comentario, $body->puntaje, $body->id_vino);
        if ($id != 0) {
            $this->view->response("El comentario se insertó con el id=$id", 200);
        } else {
            $this->view->response("El comentario no se pudo insertar", 500);
        }
    }

    function filterComments($params = null){
        $id_vino = $params[":ID"];
        $score = $params[":IDP"];
        if($score == 'Todos'){
            $comments = $this->model->getAll($id_vino);
            return $this->view->response($comments, 200);
        }else{
            $comments = $this->model->getCommentsByScore($id_vino,$score);
            return $this->view->response($comments,200);
        }
        
    }
    
    function orderComments($params = null){
        $id_vino = $params[":ID"];
        $order = $params[":IDO"];
        if($order == 'Mayor Puntaje'){
            $comments = $this->model->OrderAscScore($id_vino);
        }
        elseif($order == 'Menor Puntaje'){
            $comments = $this->model->OrderDesScore($id_vino);
        }elseif($order == 'Mas Antiguo'){
            $comments = $this->model->OrderOlder($id_vino);
        }elseif($order == 'Mas Reciente'){
            $comments = $this->model->OrderLastest($id_vino);
        }
        if($comments != null){
            $this->view->response($comments,200);    
        }else{
            $this->view->response($comments,404);
        }
        
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }



}
