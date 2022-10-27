<?php

class CommentsRepository{

    public static function getCommentsByArticle($id){
        $db = Conectar::conexion();
        $q = "SELECT * from comments where estado = 0 AND idArticle = '".$id."' ";
        $result = $db->query($q);
        $comments = [];
        while($datos = $result->fetch_assoc()) {
            $comments[] = new Comment($datos);
    
        }   
        return $comments;
    }

    public static function createComment($idUser,$idArticle,$comment){
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT into comments(idUser,idArticle,comment,hora) VALUES( '$idUser', '$idArticle' ,'$comment', '$fechaActual' ) "); 
    }

    public static function setInvisbleComment($id){
        $db = Conectar::conexion();
        $result= $db->query("UPDATE comments SET estado = '1' WHERE comments.id_comment = $id");
       
       
    }
} 


?>