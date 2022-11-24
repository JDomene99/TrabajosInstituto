<?php

class ChatRepository{
    
    
    public static function createChat($id_user1,$id_user2){
        if(isset($_SESSION["ultimoAcceso"])){
            $_SESSION["ultimoAcceso"] = date('Y-m-d H:i:s');
        }
        $db = Conectar::conexion();
        $result = $db->query("INSERT INTO chat (id_chat, id_user1, id_user2) VALUES (NULL, '$id_user1', '$id_user2');");   
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
} 

?>