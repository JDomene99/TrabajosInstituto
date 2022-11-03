<?php

class NoticiasRepository{

    public static function createNoticia($tittle, $url, $idUser){
        $db = Conectar::conexion();            
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT into noticias(id_noticia,tittle,url,autor) VALUES( null,'$tittle', '$url' ,'$idUser' ) "); 
    }

    public static function getNoticias(){
        $db = Conectar::conexion();
        $q = "SELECT * FROM noticias ";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()){
            $noticia[] = new Noticia($datos);   
        }
        return $noticia;
    }

    public static function ocultarNoticia($id_noticia){
        $db = Conectar::conexion();
        $result = $db->query("UPDATE noticias SET visible = '0' WHERE noticias.`id_noticia` = $id_noticia"); 
    }

} 
?>