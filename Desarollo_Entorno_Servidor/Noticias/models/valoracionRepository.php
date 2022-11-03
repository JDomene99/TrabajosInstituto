<?php

class ValoracionRepository{

    public static function getLikeByNoticia($idNotica){  
        
        $db = Conectar::conexion();
        $q = "SELECT  COUNT(valoracion) FROM valoracion where id_noticia = '".$idNotica."' AND valoracion = 1 ";
        $result = $db->query($q);
        $datos = $result->fetch_row();
        $valoracion = $datos[0];
        return $valoracion;   

        
    }

    public static function getDislikeByNoticia($idNotica){  
        
        $db = Conectar::conexion();
        $q = "SELECT  COUNT(valoracion) FROM valoracion where id_noticia = '".$idNotica."' AND valoracion = 0 ";
        $result = $db->query($q);
        $datos = $result->fetch_row();
        $valoracion = $datos[0];
            
        return $valoracion;      
        
    }
    
    public static function setLikeValoracion($idUser,$idNoticia){
        $entra = ValoracionRepository::comprobarSiHaValorado($idUser, $idNoticia);
        $db = Conectar::conexion();  
        //si no ha introducido ya una valoracion la introduce        
        if($entra){
            $result = $db->query("INSERT INTO valoracion (id_user, id_noticia, valoracion) VALUES ('$idUser', '$idNoticia', '1')");
        }    
        require_once("views/mainView.phtml");
        return;      
    }

    public static function setDislikeValoracion($idUser,$idNoticia){
        $entra = ValoracionRepository::comprobarSiHaValorado($idUser, $idNoticia);
        $db = Conectar::conexion();  
        //si no ha introducido ya una valoracion la introduce        
        if($entra){
            $result = $db->query("INSERT INTO valoracion (id_user, id_noticia, valoracion) VALUES ('$idUser', '$idNoticia', '0')");
        }   
        require_once("views/mainView.phtml");
        return;       
    }

    public static function comprobarSiHaValorado($idUser, $idNoticia){
        $db = Conectar::conexion();
        $q = "SELECT  valoracion FROM valoracion where id_user = '".$idUser."'AND id_noticia = '".$idNoticia."' ";
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