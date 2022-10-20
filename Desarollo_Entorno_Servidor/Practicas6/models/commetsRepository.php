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
} 


?>