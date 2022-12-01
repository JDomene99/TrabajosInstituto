<?php

class TrabajoUserRepository{

    public static function insertTrabajoUserAcepted($id_trabajo,$id_user){
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT into trabajo_user(id_trabajo_user,id_trabajo,id_user,estado,date) VALUES(null,'$id_trabajo', '$id_user' ,'aceptado', '$fechaActual') ");
           
    }

    public static function insertTrabajoUserNoAcepted($id_trabajo,$id_user){
        $db = Conectar::conexion();
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT into trabajo_user(id_trabajo_user,id_trabajo,id_user,estado,date) VALUES(null,'$id_trabajo', '$id_user' ,'no aceptado', '$fechaActual') ");
           
    }
    
    public static function getTrabajos(){
        $db = Conectar::conexion();
        $q = "Select * from trabajo_user";
        $result = $db->query($q);
        $trabajos = [];
        while($datos = $result->fetch_assoc()) {
            $trabajos[]= new TrabajoUser($datos);
    
        }   
        return $trabajos;
    }

    public static function getUserSinContestar(){
        $db = Conectar::conexion();
        $q = "SELECT id_user FROM users WHERE id_user NOT IN (SELECT id_user FROM trabajo_user)";
        $result = $db->query($q);
        $user = [];
        while($datos = $result->fetch_assoc()) {
            $user[]= ($datos['id_user']);
    
        }   
        return $user;
    }
    

} 


?>