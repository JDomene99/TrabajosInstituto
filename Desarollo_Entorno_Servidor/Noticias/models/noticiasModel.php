<?php

class Noticia{

    private $idNoticia;
    private $autor;
    private $date;
    private $tittle; 
    private $url;  
    private $like; 
    private $disLike; 
    private $visible;   

    public function __construct ($datos){
        $this->idNoticia = $datos['id_noticia']; 
        $this->autor = UserRepository::getUserById($datos['autor']); 
        $this->tittle = $datos['tittle'];
        $this->url = $datos['url'];
        $this->like = ValoracionRepository::getLikeByNoticia($datos['id_noticia']);  
        $this->disLike = ValoracionRepository::getDislikeByNoticia($datos['id_noticia']); 
        $this->visible = $datos['visible'];  
       
    }   

    public function getAutor(){
        return $this->autor;
    }

    public function getTittle(){
        return $this->tittle;
    }

    public function getVisibilidad(){
        return $this->visible;
    }

    public function getUrl(){
        return $this->url;
    }

    public function getIdNoticia(){
        return $this->idNoticia;
    }

    public function getLike(){
        if($this->like != null){
            return $this->like;
        }
        else{
            return 0;
        }
        
    }

    public function getDisLike(){
        if($this->disLike != null){
            return $this->disLike;
        }
        else{
            return 0;
        }
        
    }

} 

?>