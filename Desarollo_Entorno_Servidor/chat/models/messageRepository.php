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
    


    public static function insertMessage($message,$id_user,$id_sala){
        if(isset($_SESSION["ultimoAcceso"])){
            $_SESSION["ultimoAcceso"] = date('Y-m-d H:i:s');
        }
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT INTO `messages` (`id_message`, `message`, `incoming_msg`, `id_sala`, `date`) VALUES (NULL, '$message', '$id_user', '$id_sala', '$fechaActual' )");      
        
    }

    public static function getMessagesBySala($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM messages where id_sala = '".$id."' ";
        $result = $db->query($q);
        $messages = [];
        while($datos = $result->fetch_assoc()){
            $messages[] = new Message($datos);        
        }
        return $messages;
        echo $messages;
        
    }  

    public static function getMessagesByChat($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM messages where id_chat = '".$id."' ";
        $result = $db->query($q);
        $messages = [];
        while($datos = $result->fetch_assoc()){
            $messages[] = new Message($datos);        
        }
        return $messages;
        echo $messages;
        
    }
    
} 

?>