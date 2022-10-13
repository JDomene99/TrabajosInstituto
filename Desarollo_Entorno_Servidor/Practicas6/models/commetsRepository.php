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

    public static function getUserById($id){
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where id = '".$id."' ";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $user[] = new User($datos);
        }   
        return $user;
    }
// 
    public static function getCommentsByUser($id){
        $db = Conectar::conexion();
        $q = "SELECT comment from comments where idUser = (SELECT id from users where id = '".$id."')";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $user[] = new User($datos);
        }   
        return $user;
    }
} 


?>