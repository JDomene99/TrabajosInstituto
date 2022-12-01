<?php

class JornadaRepository{

    public static function createJornada($id_user){
        $date = date('Y/m/d');
        $db = Conectar::conexion();            
        $result = $db->query("INSERT INTO jornada (id_jornada, startDate, id_user, estado) VALUES (NULL, '$date',  '$id_user', 'abierta')"); 
       
    }

    public static function editJornada($id_jornada){
        $date = date('Y/m/d');
        echo 'dada';
        $db = Conectar::conexion();
        $result = $db->query("UPDATE jornada SET id_jornada = ' $id_jornada' , finishDate = '$date',estado = 'finalizada' WHERE jornada.id_jornada = $id_jornada"); 
    }

    public static function editJornadaIncidencia($id_jornada){
        $date = date('Y/m/d');
        echo 'dada';
        $db = Conectar::conexion();
        $result = $db->query("UPDATE jornada SET id_jornada = ' $id_jornada' , finishDate = '$date',estado = 'finalizada', incidencia = '1' WHERE jornada.id_jornada = $id_jornada"); 
    }

    public static function getIdJornada($id_user){
        $db = Conectar::conexion();
        $q = "SELECT id_jornada FROM jornada where id_user = '".$id_user."'  ";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()){
            return  $datos['id_jornada'];
        }
        else{
            return true;
        }
        
    } 

    public static function checkJornada($id_user){
        $db = Conectar::conexion();
        $q = "SELECT id_jornada FROM jornada where id_user = '".$id_user."' and estado = 'abierta' ";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()){
            return  false;
        }
        else{
            return true;
        }  
    } 

    public static function getInformesByDay($date){
        $db = Conectar::conexion();
        $q = "select * from jornada where finishDate LIKE '".$date."';";
        $result = $db->query($q);
        $jornadas = [];
        while($datos = $result->fetch_assoc()){
            $jornadas[] = new Jornada($datos);
        }
        return  $jornadas;
        
    } 

    public static function getInformesByDayAndUser($date,$Id_user){
        $db = Conectar::conexion();
        $q = "select * from jornada where id_user = '".$id_user."' finishDate LIKE '".$date."';";
        $result = $db->query($q);
        $jornadas = [];
        while($datos = $result->fetch_assoc()){
            $jornadas[] = new Jornada($datos);
        }
        return  $jornadas;
        
    }
    


    
} 
?>