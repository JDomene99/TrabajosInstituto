<?php

class ArticleRepository{

    public static function getArticle(){
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM article LIMIT 0,3";
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
        $q = "SELECT * FROM article where tittle LIKE '"."%".$tittle."%"."' LIMIT 0,3 ";
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

    public static function getCountarticle(){
        
        $db = Conectar::conexion();
        $q =  "SELECT Count(*) FROM article";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $numTotal = 0;
        foreach($datos as $item){
            $numTotal = $item;
        }
        return  ceil($numTotal/3);
            
    }

    public static function get3article($numeroPagina){
        $numeroTotal = ArticleRepository::getCountarticle();
        echo $numeroTotal;
        $db = Conectar::conexion();
        $q = "SELECT * FROM article LIMIT $numeroPagina , 3 ";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $article[] = new Article($datos);
        } 
        return $article;
    }

    public static function getCountarticleFindArticle($tittle){
        $db = Conectar::conexion();
        $q = "SELECT Count(*) FROM article where tittle LIKE '"."%".$tittle."%"."' LIMIT 0,3 ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $numeroTotal = 0;
        foreach($datos as $item){
            $numeroTotal = $item;
        }
        return $numeroTotal/3;
    }
    
} 
// 

?>