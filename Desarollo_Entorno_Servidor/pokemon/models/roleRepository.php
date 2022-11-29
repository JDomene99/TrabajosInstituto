<?php

class RolRepository{
    
    public static function getRoles(){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM rol";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {

            $roles[] = new Rol($datos);
        }   
        return $roles;
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