<?php

class TrabajoRepository{

    public static function getAllTrabajos(){
        $db = Conectar::conexion();
        $q = "SELECT * from trabajo where visible = 0";
        $result = $db->query($q);
        $trabajos = [];
        while($datos = $result->fetch_assoc()) {
            $trabajos[] = new Trabajo($datos);
    
        }   
        return $trabajos;
    }

    public static function createTrabajo($descriptionTrabajo,$startDate,$finishDate,$sueldo){
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT INTO trabajo (id_trabajo, description, startDate, finishDate, sueldo) VALUES (NULL, '$descriptionTrabajo', '$startDate', '$finishDate', '$sueldo')"); 
    }

    public static function getTrabajoById($id_trabajo){
        $db = Conectar::conexion();
        $q = "SELECT * from trabajo where id_trabajo = '$id_trabajo'";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()) {
            $trabajos = new Trabajo($datos);
    
        }   
        return $trabajos;
    }

    public static function notVisible($id_trabajo){
        $db = Conectar::conexion();
        $result = $db->query("UPDATE trabajo SET visible = '1' WHERE trabajo.id_trabajo = $id_trabajo");         
    }

} 


?>