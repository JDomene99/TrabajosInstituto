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
    
    public static function getRoleAllUserRegister(){  
        
        $db = Conectar::conexion();
        $q = "SELECT * from users where id_rol = (SELECT id_rol);" ;
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }   
        return $users;  
        
    } 
    
    public static function updateRol($id_user){  
        
        $db = Conectar::conexion();
        //si es admin lo haces normal 
        $q = "SELECT id_rol from users where id_user = '".$id_user."' " ; 
        $result = $db->query($q); 
        $datos = $result->fetch_column();
        if($datos == 0){
            $result = $db->query("UPDATE users SET id_rol = '1' WHERE users.id_user = $id_user"); 
        }
        //si es normal lo haces admin
        else{
            $result = $db->query("UPDATE users SET id_rol = '0' WHERE users.id_user = $id_user"); 
        }  
    } 
} 

?>