<?php

class Article{

    private $id_article;
    private $id_autor;
    private $date;
    private $seccion; 
    private $tittle;   
    private $image;
    private $comments;
    private $rating;

    public function __construct ($datos){
        $this->id_article = $datos['id_article']; 
        $this->id_autor = UserRepository::getUserById($datos['id_autor']); 
        $this->date = $datos['date']; 
        $this->seccion = $datos['seccion']; 
        $this->tittle = $datos['tittle'];
        $this->image = $datos['image'];
        $this->comments = CommentsRepository::getCommentsByArticle($datos['id_article']); 
        $this->rating = $datos['rating'];       
    }   

    public function getIdArticle(){
        return $this->id_article;
    }

    public function getAutor(){
        return $this->id_autor;
    }

    public function getComments(){
        return $this->comments;
    }

    public function getRating(){
        return $this->rating;
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

   
    public function getImage(){
        return $this->image;
    }

} 

?>