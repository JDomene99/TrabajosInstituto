<?php

class ValoracionRepository{
    
    public static function getValoracion($idArticle){  
        
        $db = Conectar::conexion();
        $q = "SELECT  AVG(valoracion) FROM valoracion where id_article = '".$idArticle."' ";
        $result = $db->query($q);
        $datos = $result->fetch_row();
        $valoracion = $datos[0];
        return round($valoracion,1);      
        
    }

    public static function setValoracion($idUser,$idArticle,$valoracion ){
        $entra = ValoracionRepository::comprobarSiHaValorado($idUser, $idArticle);
        $db = Conectar::conexion();  
        //si no ha introducido ya una valoracion la introduce        
        if($entra){
            $result = $db->query("INSERT INTO valoracion (id_user, id_article, valoracion) VALUES ('$idUser', '$idArticle', '$valoracion')");
        }          
    }

    public static function comprobarSiHaValorado($idUser, $idArticle){
        $db = Conectar::conexion();
        $q = "SELECT  valoracion FROM valoracion where id_user = '".$idUser."'AND id_article = '".$idArticle."' ";
        $result = $db->query($q);
        $datos = $result->fetch_row();
        $valoracion;
        if(!$datos){
            $valoracion =  true; 
        }
        else{
            $valoracion = false;
        }
        return $valoracion;
    }
    
    
} 

?>