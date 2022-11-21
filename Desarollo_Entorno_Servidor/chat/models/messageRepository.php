<?php

class MessageRepository{
    
    public static function getAllMessages(){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM messages";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()){

            $messages[] = new Message($datos);        
        }
        return $messages;  
        
    }  
    


    public static function insertMessage($message,$id_user){
        
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT INTO `messages` (`id_message`, `message`, `incoming_msg`, `outgoing_msg`, `date`) VALUES (NULL, '$message', '$id_user', '', '$fechaActual' )");      
        
    }
    
} 

?>