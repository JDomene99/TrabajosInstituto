<?php

class CommentsRepository{

    public static function getCommentsByArticle($id_article){
        $db = Conectar::conexion();
        $q = "SELECT * from comments where id_article = '".$id_article."' ";
        $result = $db->query($q);
        $comments = [];
        while($datos = $result->fetch_assoc()) {
            $comments[] = new Comment($datos);
    
        }   
        return $comments;
    }

    public static function createComment($id_user,$id_article,$comment){
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT into comments(id_user,id_article,comment,hora) VALUES( '$id_user', '$id_article' ,'$comment', '$fechaActual' ) "); 
    }

    public static function setInvisbleComment($id){
        $db = Conectar::conexion();
        $result= $db->query("UPDATE comments SET estado = '1' WHERE comments.id_comment = $id");
       
       
    }
} 


?>