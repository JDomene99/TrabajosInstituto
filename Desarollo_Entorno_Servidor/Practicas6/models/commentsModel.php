<?php

class Comment{

    private $idUser;
    private $comment;  
    private $hora;  

    public function __construct ($datos){
        $this->idUser = UserRepository::getUserById($datos['idUser']); 
        $this->hora = $datos['hora'];  
        $this->comment = $datos['comment'];    
    }   

    public function getComment(){
        return $this->comment;
    }

    public function getTime(){
        return $this->hora;
    }
    
    public function getUser(){
        return $this->idUser;
    }

    public function __toString(){
        return $this->idUser. 'ha comentado: '.$this->comment;
    }
} 

?>