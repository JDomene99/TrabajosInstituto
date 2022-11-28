<?php

class Comment{
    
    private $idComment;
    private $idUser;
    private $comment;  
    private $hora;  
    private $estado;

    public function __construct ($datos){
        $this->idComment = $datos['id_comment'];  
        $this->idUser = UserRepository::getUserById($datos['idUser']); 
        $this->hora = $datos['hora'];  
        $this->comment = $datos['comment']; 
        $this->estado = $datos['estado'];     
    }   

    public function getIdComment(){
        return $this->idComment;
    }

    public function getComment(){
        return $this->comment;
    }

    public function getEstado(){
        $estado = true;
        if($this->estado == 1){
            $estado = false;
        }
        return $estado;
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