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

    

} 
// 

?>