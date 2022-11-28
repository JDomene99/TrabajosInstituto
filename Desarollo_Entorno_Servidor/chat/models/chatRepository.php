<?php

class ChatRepository{
    
    
    public static function createChat($id_user1,$id_user2){
        if(isset($_SESSION["ultimoAcceso"])){
            $_SESSION["ultimoAcceso"] = date('Y-m-d H:i:s');
        }
        $db = Conectar::conexion();
        $result = $db->query("INSERT INTO chat (id_chat, id_user1, id_user2) VALUES (NULL, '$id_user1', '$id_user2')");
        return $db->insert_id;    
 
    }
    
    public static function getChatById($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM chat where id_chat = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $chat = new Chat($datos);
        return $chat;  
        
    }  

    public static function ckeckChat($id_user1,$id_user2){  
        
        $db = Conectar::conexion();
        $q = "Select * from chat where (id_user1 = '".$id_user1."' and id_user2 = '".$id_user2."') OR (id_user1 = '".$id_user2."' and id_user2 = '".$id_user1."');";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()){
            return $chat = new Chat($datos);
        }else{
            $result = $db->query("INSERT INTO chat (id_chat, id_user1, id_user2) VALUES (NULL, '$id_user1', '$id_user2')");
        }
    }  


    public static function findChat($id_user1,$id_user2){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM chat where id_user1 = '".$id_user1."' AND id_user2 = '".$id_user2."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $chat = new Chat($datos);
        return $chat;  
        
    } 

    public static function insertMessageToPrivateChat($id_chat,$message,$id_user){
        if(isset($_SESSION["ultimoAcceso"])){
            $_SESSION["ultimoAcceso"] = date('Y-m-d H:i:s');
        }
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT INTO messages (id_message, message, incoming_msg, id_sala, date, id_chat) VALUES (NULL, '$message', '$id_user', '', '$fechaActual', '$id_chat')");      
        
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