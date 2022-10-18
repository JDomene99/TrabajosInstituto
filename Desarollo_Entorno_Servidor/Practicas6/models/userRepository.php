<?php

class UserRepository{
    
    public static function getUserById($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where id = '".$id."' ";
        echo $q;
        $result = $db->query($q);
        $datos = $result->fetch_assoc();     
        return new User($datos);   
    }
} 

?>