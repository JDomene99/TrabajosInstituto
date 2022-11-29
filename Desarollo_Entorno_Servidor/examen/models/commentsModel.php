<?php

class Comment{
    
    private $id_Comment;
    private $id_user;
    private $message;  
    private $date;  
   

    public function __construct ($datos){
        $this->id_Comment = $datos['id_comment'];  
        $this->id_user = UserRepository::getUserById($datos['id_user']); 
        $this->date = $datos['date'];  
        $this->message = $datos['message']; 
       
    }   

    public function getIdComment(){
        return $this->idComment;
    }

    public function getComment(){
        return $this->comment;
    }

    public function getTime(){
        return $this->date;
    }
    
    public function getUser(){
        return $this->idUser;
    }

    public function __toString(){
        return $this->idUser. 'ha comentado: '.$this->comment;
    }
} 

?>