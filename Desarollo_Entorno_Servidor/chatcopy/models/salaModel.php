<?php

class Sala{
    private $id_sala;
    private $id_user;
    private $messages;
    private $name;
    
    public function __construct($datos){
        $this->id_sala = $datos['id_sala']; 
        $this->messages = MessageRepository::getMessagesBySala($datos['id_sala']);
        $this->id_user = UserRepository::getUserById($datos['id_user']);
        $this->name = $datos['name'];  
    }   

    public function getIdSala(){
        return $this->id_sala;
    }
    
    public function getIdUser(){
        return $this->id_user;
    } 
    
    public function getMessages(){
        return $this->messages;
    } 
    public function getName(){
        return $this->name;
    } 
} 
?>