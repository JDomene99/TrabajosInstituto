<?php

class Comment{

    private $idUser;
    private $idArticle;
    private $comment;    

    public function __construct ($datos){
        
        $this->idUser = UserRepository::getUserById('idUser'); 
        $this->idArticle = CommentsRepository::getArticleById('idArticle');
        $this->hora = $datos['hora'];  
        $this->comment = $datos['comment'];    
    }   

    public function getComment(){
        return $this->comment;
    }
    
    public function getUser(){
        return $this->user;
    }

    public function __toString(){
        return $this->user. 'ha comentado: '.$this->comment;
    }
} 

?>