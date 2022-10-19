<?php

class ArticleRepository{

    public static function getArticle(){
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM article";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {

            $article[] = new Article($datos);
        }   
        return $article;
    }

    public static function getArticleById($id){
        $db = Conectar::conexion();
        $q = "SELECT * FROM article where idArticle = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $article[] = new Article($datos);    
        return $article;
        require_once("views/mainController.phtml");
    } 

    public static function findArticle($tittle){
        $db = Conectar::conexion();
        $q = "SELECT name FROM article where tittle LIKE '".$tittle."' ";
        $result = $db->query($q);
        $article=[];
        while($datos = $result->fetch_assoc()) {
            $article[] = new Article($datos);
        }   
        return $article;
        // require_once("views/mainController.phtml");
    } 
    
} 
// 

?>