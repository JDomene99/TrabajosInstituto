<?php

class SalaRepository{
    
    public static function getAllSale(){  
        
        $db = Conectar::conexion    ();
        $q = "SELECT * FROM salas";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()){
            $salas[] = new Sala($datos);        
        }
        return $salas;  
        
    }  
    
    public static function createSala($id_user,$nameSala){
        if(isset($_SESSION["ultimoAcceso"])){
            $_SESSION["ultimoAcceso"] = date('Y-m-d H:i:s');
        }
        $db = Conectar::conexion();
        echo $id_user;
        $result = $db->query("INSERT INTO salas (id_sala, id_user, name) VALUES (NULL, '$id_user', '$nameSala');");      
        
    }


    public static function getSalaById($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM salas where id_sala = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $sala = new Sala($datos);
        return $sala;  
        
    }  

    
    
} 

?>