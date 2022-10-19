<?php

class UserRepository{
    
    public static function getUserById($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where id = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $user[] = new User($datos);
        return $user;  
        
    }

    public static function getAllUserRegister(){  
        
        $db = Conectar::conexion();
        $q = "SELECT name,id_rol FROM users" ;
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }   
        return $users;  
        
    }
   
    
} 

?>