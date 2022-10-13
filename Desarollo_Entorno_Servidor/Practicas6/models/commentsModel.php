<?php

class Comment{

    private $user;
    private $comment;    

    public function __construct ($datos){
        // $this->user = ;

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