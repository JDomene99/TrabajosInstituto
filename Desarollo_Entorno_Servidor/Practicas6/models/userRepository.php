<?php

class UserRepository{
    
    public static function getUserById($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where id = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $user = new User($datos);
        return $user;  
        
    }

    public static function getRoleAllUserRegister(){  
        
        $db = Conectar::conexion();
        $q = "SELECT * from users where id_rol = (SELECT id_rol);" ;
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }   
        return $users;  
        
    }  
    
    public static function loginUser($user, $password){
        $db = Conectar::conexion();
        $q = "SELECT * FROM users WHERE name= '".$user."'";
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
            $result = $db->query("INSERT into users(id,name,password,image,id_rol) VALUES( null, '$nombre' , '$passwordUser', 'profile.png' , '2' ) ");      
        }
    }
    
} 

?>