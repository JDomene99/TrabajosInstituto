<?php

class ArticleRepository{

    public static function getArticleById($id_article){
        $db = Conectar::conexion();
        $q = "SELECT * FROM articles where id_article = '".$id_article."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $article[] = new Article($datos);    
        return $article;
    } 

    public static function createArticle($seccion,$tittle,$image,$id_autor){
            $ruta = './views/imagenes/';
            $uploadfile = $ruta . basename($image['name']);
            if (move_uploaded_file($image['tmp_name'], $uploadfile)) {} 
            $db = Conectar::conexion();            
            $fechaActual = date('Y-m-d H:i:s');
            $imageToUpload = $image['name'];
            $result = $db->query("INSERT into articles(id_article, id_autor, tittle, seccion, date, rating, image) VALUES( null, $id_autor,'$tittle', '$seccion', '$fechaActual', '0' , '$imageToUpload' ) "); 
    }

    public static function editArticle($id_article,$seccion,$titulo,$image){
        $ruta = './views/imagenes/';
        $uploadfile = $ruta . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $uploadfile)) {} 
        $fechaActual = date('Y-m-d H:i:s');
        $imageToUpload = $image['name'];
        $db = Conectar::conexion();
        $result = $db->query("UPDATE articles SET id_article = ' $id_article' , seccion = '$seccion', tittle = '$titulo' , date = '$fechaActual' , imagen = '$imageToUpload' WHERE article.`idArticle` = $idArticle"); 
    }

    public static function getCountarticle(){
        
        $db = Conectar::conexion();
        $q =  "SELECT Count(*) FROM articles";
        $result = $db->query($q);
        $totalArticle = (int)$result->fetch_column();
        return ceil($totalArticle/3);         
    }

    public static function getArticle($numeroPagina){
        $numeroTotal = ArticleRepository::getCountarticle();
        
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM articles LIMIT $pagFinal , 3 ";
            $result = $db->query($q);
            while($datos = $result->fetch_assoc()) {
                $article[] = new Article($datos);
            } 
            return $article;
        }
    }

    public static function getCountarticleFindArticle($tittle){
        $db = Conectar::conexion();
        $q = "SELECT Count(*) FROM articles where tittle LIKE '"."%".$tittle."%"."' LIMIT 0,3 ";
        $result = $db->query($q);
        $totalArticleFind = (int)$result->fetch_column();
        return ceil($totalArticleFind/3);
    }
    
    public static function findArticle($tittle, $numeroPagina){
        $numeroTotal = ArticleRepository::getCountarticleFindArticle($tittle);
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM articles where tittle LIKE '"."%".$tittle."%"."' LIMIT $pagFinal,3 ";
            $result = $db->query($q);
            $article=[];
            while($datos = $result->fetch_assoc()) {
                $article[] = new Article($datos);
            } 
            return $article;  
        }      
    } 
} 
?>