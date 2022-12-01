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
    
    public static function loginUser($dni, $password){

        $db = Conectar::conexion();
        $q = "SELECT * FROM users WHERE dni= '".$dni."'";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()) {
            if($datos['password'] == $password) {
                $_SESSION['user'] = new User($datos);
                
            }
        }
    }
    
    public static function registerUser($nombre,$apellidos,$email,$telefono,$passwordUser,$dni){
        $db = Conectar::conexion();
        $result = $db->query("SELECT * FROM users WHERE name = '".$nombre."' ");
        if(!$datos = $result->fetch_assoc()) {
            $result = $db->query("INSERT INTO users (id_user, name, password, id_rol, apellidos, telefono, email, dni) VALUES (NULL, '$nombre', '$passwordUser', '1', '$apellidos', '$telefono', '$email', '$dni');");      
        }
    }

    public static function updateUser($id_user,$nombre,$apellidos,$email,$telefono,$dni){
        $db = Conectar::conexion();
        $result = $db->query("UPDATE users SET name = '$nombre', apellidos = '$apellidos', telefono = '$telefono', email = '$email', dni = '$dni' WHERE users.id_user = $id_user");      
        
    }  
    
    
    public static function getAllUser(){
        $db = Conectar::conexion();
        $q = "SELECT * from users where id_rol = 1";
        $result = $db->query($q);
        $users = [];
        while($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
    
        }   
        return $users;
    }


    public static function getUserByName($name){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where name = '".$name."' ";
        $result = $db->query($q);
        $users = [];
        while($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
    
        }   
        return $users;  
        
    }


    
    
} 

?>