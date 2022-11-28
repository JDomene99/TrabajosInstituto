<?php

class Message{
    private $id_message;
    private $message;
    private $incoming_msg;
    // private $id_sale;
    private $date;
    
    public function __construct($datos){
        $this->id_message = $datos['id_message']; 
        $this->message = $datos['message'];
        $this->date = $datos['date'];
        // $this->id_sale = SalaRepository::getSalaById($datos['id_sale']);
        $this->incoming_msg = UserRepository::getUserById($datos['incoming_msg']);  
               
    }   

    public function getIdMessage(){
        return $this->id_message;
    }
    
    public function getMessage(){
        return $this->message;
    }  

    public function getUser(){
        return $this->incoming_msg;
    }
    
    public function getDate(){
        return $this->date;
    }   
} 
?>