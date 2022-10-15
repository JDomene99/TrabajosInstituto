<?php

class CommentsRepository{

    public static function getComments(){
       
        $db = Conectar::conexion();
        $q = "SELECT * FROM comments" ;
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $comments[] = new Comment($datos);
        }   
        return $comments;
    }

    public static function getCommentsByArticle($id){
        $db = Conectar::conexion();
        $q = "SELECT * from comments where idArticle = (SELECT idArticle from article where idArticle = '".$id."')";
        $result = $db->query($q);
        $comments = [];
        while($datos = $result->fetch_assoc()) {
            $comments[] = new Comment($datos);
        }   
        if(!$datos){
            return $comments;
        }
        
    }
} 


?>