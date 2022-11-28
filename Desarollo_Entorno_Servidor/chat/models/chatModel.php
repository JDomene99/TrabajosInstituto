<?php

class Chat{
    private $id_chat;
    private $id_user1;
    private $id_user2;
    private $messages;
    
    public function __construct($datos){
        $this->id_chat = $datos['id_chat']; 
        $this->id_user1 = UserRepository::getUserById($datos['id_user1']);
        $this->id_user2 = UserRepository::getUserById($datos['id_user2']);
        $this->messages = MessageRepository::getMessagesByChat($datos['id_chat']);
               
    }   

    public function getIdChat(){
        return $this->id_chat;
    }

    public function getMessages(){
        return $this->messages;
    }
     

    public function getUser1(){
        return $this->id_user1;
    }
    
    public function getUser2(){
        return $this->id_user2;
    }   
} 
?>