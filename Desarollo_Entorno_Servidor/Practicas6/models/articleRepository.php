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

    public static function getArticleById2($id){
        $db = Conectar::conexion();
        $q = "SELECT * FROM article where idArticle = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $article[] = new Article($datos);    
        return $article;
        require_once("controller/articleController.php");
    } 

} 
// 

?>