<?php

class Valoracion{
    private $valoracion;
    private $id_user;
    private $id_article;
    
    public function __construct($datos){
        $this->valoracion = $datos['valoracion'];
        $this->id_user = $datos['id_user'];        
    }   

    public function getValoracion(){
        return $this->valoracion;
    }
    
    public function getIdUser(){
        return $this->id_user;
    }

    

    public function getIdArticle(){
        return $this->id_article;
    }
} 
?>