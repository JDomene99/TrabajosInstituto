<?php

class Article{

    private $idArticle;
    private $autor;
    private $date;
    private $seccion; 
    private $tittle;   
    private $image;
    private $comments;
    private $valoracion;

    public function __construct ($datos){
        $this->idArticle = $datos['idArticle']; 
        $this->autor = UserRepository::getUserById($datos['autor']); 
        $this->date = $datos['date']; 
        $this->seccion = $datos['seccion']; 
        $this->tittle = $datos['tittle'];
        $this->image = $datos['imagen'];
        $this->comments = CommentsRepository::getCommentsByArticle($datos['idArticle']); 
        $this->valoracion = $datos['valoracion'];       
    }   

    public function getAutor(){
        return $this->autor;
    }

    public function getComments(){
        return $this->comments;
    }

    public function getValoracion(){
        return $this->valoracion;
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
    public function getImage(){
        return $this->image;
    }
    // 
} 

?>