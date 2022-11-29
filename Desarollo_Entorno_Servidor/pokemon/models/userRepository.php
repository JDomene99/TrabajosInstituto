<?php

class UserRepository{
    
    public static function getUserById($id_user){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where id_user = '".$id_user."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $user = new User($datos);
        return $user;  
        
    }
    
    public static function loginUser($name, $password){
        $db = Conectar::conexion();
        $q = "SELECT * FROM users WHERE name= '".$name."'";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()) {
            if($datos['password'] == $password) {
                $_SESSION['user'] = new User($datos);
                
            }
        }
    }

    public static function registerUser($nombre,$passwordUser){
        $db = Conectar::conexion();
        $result = $db->query("SELECT * FROM users WHERE name = '".$nombre."' ");
        if(!$datos = $result->fetch_assoc()) {
            $result = $db->query("INSERT into users(id_user,name,password,id_rol) VALUES( null, '$nombre' , '$passwordUser',  '1' ) ");      
        }
    }
    
    
} 

?>