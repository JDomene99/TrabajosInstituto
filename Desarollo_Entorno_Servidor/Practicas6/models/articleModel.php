<?php

class Article{

    public $idArticle;
    public $autor;
    public $date;
    public $seccion; 
    public $tittle;   
    public $image;
    public $comments;

    public function __construct ($datos){
        $this->idArticle = $datos['idArticle']; 
        $this->autor = UserRepository::getUserById($datos['autor']); 
        $this->date = $datos['date']; 
        $this->seccion = $datos['seccion']; 
        $this->tittle = $datos['tittle'];
        $this->image = $datos['imagen'];
        $this->comments = CommentsRepository::getCommentsByArticle($datos['idArticle']);        
    }   

    public function getAutor(){
        return $this->autor;
    }

    public function getComments(){
        return $this->comments;
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