<?php

class ValoracionRepository{
    
    public static function getValoracion($idArticle){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM valoracion where id_article = '".$idArticle."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $valoracion = new Valoracion($datos);
        return $valoracion;  
        
    }

    public static function setValoracion($valoracion, $idArticle, $idUser){
        echo $valoracion;
        echo $idArticle;
        echo $idUser;
        $db = Conectar::conexion();            
        $result = $db->query("INSERT INTO valoracion (id_user, id_article, valoracion) VALUES ('$idArticle', '$idUser', '$valoracion')"); 
        
    }

    
    
} 

?>