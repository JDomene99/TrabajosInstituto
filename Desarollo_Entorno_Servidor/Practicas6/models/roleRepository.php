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
    
} 

?>