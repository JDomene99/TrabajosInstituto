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
        $q = "SELECT * FROM article where tittle LIKE '"."%".$tittle."%"."' ";
        $result = $db->query($q);
        $article=[];
        while($datos = $result->fetch_assoc()) {
            $article[] = new Article($datos);
        }   
        return $article;
        require_once("controllers/mainController.php");
    } 

    public static function editArticle($idArticle,$texto,$titulo){
        $fechaActual = date('d-m-Y H:i:s');
        $db = Conectar::conexion();
        $result = $db->query("UPDATE article SET idArticle = ' $idArticle' , date = '$fechaActual' , seccion = '$texto', tittle = '$titulo' WHERE article.`idArticle` = $idArticle"); 
    }
    
} 
// 

?>