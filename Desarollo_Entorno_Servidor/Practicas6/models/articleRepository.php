<?php

class ArticleRepository{

    public static function getArticleById($id){
        $db = Conectar::conexion();
        $q = "SELECT * FROM article where idArticle = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $article[] = new Article($datos);    
        return $article;
        require_once("views/mainController.phtml");
    } 

    public static function createArticle($texto, $tittle,$image,$idUser){
            $ruta = './views/imagenes/';
            $uploadfile = $ruta . basename($image['name']);
            if (move_uploaded_file($image['tmp_name'], $uploadfile)) {} 
            $db = Conectar::conexion();            
            $fechaActual = date('Y-m-d H:i:s');
            $imageToUpload = $image['name'];
            $result = $db->query("INSERT into article(idArticle,date,seccion,tittle,imagen,autor) VALUES( null,'$fechaActual', '$texto' ,'$tittle', '$imageToUpload','$idUser' ) "); 
    }

    public static function editArticle($idArticle,$texto,$titulo,$image){
        $ruta = './views/imagenes/';
        $uploadfile = $ruta . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $uploadfile)) {} 
        $fechaActual = date('Y-m-d H:i:s');
        $imageToUpload = $image['name'];
        $db = Conectar::conexion();
        $result = $db->query("UPDATE article SET idArticle = ' $idArticle' , date = '$fechaActual' , seccion = '$texto', tittle = '$titulo' , imagen = '$imageToUpload' WHERE article.`idArticle` = $idArticle"); 
    }

    public static function getCountarticle(){
        
        $db = Conectar::conexion();
        $q =  "SELECT Count(*) FROM article";
        $result = $db->query($q);
        $totalArticle = (int)$result->fetch_column();
        return ceil($totalArticle/3);         
    }

    public static function getArticle($numeroPagina){
        $numeroTotal = ArticleRepository::getCountarticle();
        
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM article LIMIT $pagFinal , 3 ";
            $result = $db->query($q);
            while($datos = $result->fetch_assoc()) {
                $article[] = new Article($datos);
            } 
            return $article;
        }
    }

    public static function getCountarticleFindArticle($tittle){
        $db = Conectar::conexion();
        $q = "SELECT Count(*) FROM article where tittle LIKE '"."%".$tittle."%"."' LIMIT 0,3 ";
        $result = $db->query($q);
        $totalArticleFind = (int)$result->fetch_column();
        return ceil($totalArticleFind/3);
    }
    
    public static function findArticle($tittle, $numeroPagina){
        $numeroTotal = ArticleRepository::getCountarticleFindArticle($tittle);
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM article where tittle LIKE '"."%".$tittle."%"."' LIMIT $pagFinal,3 ";
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