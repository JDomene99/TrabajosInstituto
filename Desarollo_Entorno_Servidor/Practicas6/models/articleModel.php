<?php

class Article{

    private $idArticle;
    private $autor;
    private $date;
    private $seccion; 
    private $tittle;   
    private $imagen;
    private $idUser;

    public function __construct ($datos){
        $this->idArticle = $datos['idArticle']; 
        $this->autor = UserRepository::getUserById('idUser'); 
        $this->date = $datos['date']; 
        $this->seccion = $datos['seccion']; 
        $this->tittle = $datos['tittle'];
        $this->imagen = $datos['imagen']; 
        $this->idUser = $datos['idUser']; 
             
    }   

    public function getAutor(){
        return $this->autor;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTittle(){
        return $this->tittle;
    }

    public function getSeccion(){
        return $this->seccion;
    }

    public function getIdArticle(){
        return $this->idArticle;
    }
    // 
} 

?>