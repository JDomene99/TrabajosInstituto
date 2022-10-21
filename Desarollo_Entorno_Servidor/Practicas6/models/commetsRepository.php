<?php

class CommentsRepository{

    public static function getCommentsByArticle($id){
        $db = Conectar::conexion();
        $q = "SELECT * from comments where idArticle = '".$id."' ";
        $result = $db->query($q);
        $comments = [];
        while($datos = $result->fetch_assoc()) {
            $comments[] = new Comment($datos);
    
        }   
        return $comments;
    }

    public static function createComment($idUser,$idArticle,$comment){
        $db = Conectar::conexion();
        $fechaActual = date('d-m-Y H:i:s');
        $result = $db->query("INSERT into comments(idUser,idArticle,comment,hora) VALUES( '$idUser', '$idArticle' ,'$comment', '$fechaActual' ) "); 
    }
} 


?>