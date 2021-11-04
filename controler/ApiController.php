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

    function getComments(){
        $comments = $this->model->getAll();
        return $this->view->response($comments, 200);
    }

    function getComment($params = []){
        $id_vino = $params[":ID"];
        $comment = $this->model->getOne($id_vino);
        return $this->view->response($comment, 200);
    }


    function deleteComment($params = null) {
        $idComment = $params[":ID"];
        $comment = $this->model->checkOne($idComment);
        if ($comment) {
            $this->model->delete($idComment);
            return $this->view->response("El comentario con el id=$idComment fue borrado", 200);
        } else {
            return $this->view->response("El comentario con el id=$idComment no existe", 404);
        }
    }

    function insertComment($params = null) {
        $body = $this->getBody();
        $id = $this->model->insert($body->comentario, $body->puntaje, $body->id_vino);
        if ($id != 0) {
            $this->view->response("El comentario se insertó con el id=$id", 200);
        } else {
            $this->view->response("El comentario no se pudo insertar", 500);
        }
    }

    function actualizarTarea($params = null) {
        $idComment = $params[':ID'];
        $body = $this->getBody();

        $comment = $this->model->getOne($idComment);

        if ($comment) {
            $this->model->update($idComment, $body->titulo, $body->descripcion, $body->prioridad, $body->finalizada);
            $this->view->response("La tarea se actualizó correctamente", 200);
        } else {
            return $this->view->response("La tarea con el id=$idComment no existe", 404);
        }
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }



}
