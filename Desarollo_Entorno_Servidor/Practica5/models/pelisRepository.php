<?php

class PelisRepository{

    public static function getPelis(){
        $db = Conectar::conexion();
        $q = "SELECT * FROM pelis" ;
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $pelis[] = new Pelis($datos);
        }   
        return $pelis;
    }

    public static function findPelis($textoToFind){
        $texto = "%".$textoToFind."%";
        $db = Conectar::conexion();
        $q = "SELECT * FROM pelis WHERE name LIKE '".$texto."' ";
        $result = $db->query($q);
        $pelis=[];
        while($datos = $result->fetch_assoc()) {
            $pelis[] = new Pelis($datos);
        }   
        return $pelis;
    }

    // public static function findPelis($textoToFind){
    // //     $texto = "%".$textoToFind."%";
    //     $db = Conectar::conexion();
    //     $q = "SELECT * FROM pelis WHERE name LIKE '".$texto."' ";
    //     $result = $db->query($q);
    //     $pelis=[];
    //     while($datos = $result->fetch_assoc()) {
    //         $pelis[] = new Pelis($datos);
    //     }   
    //     return $pelis;
    // }
} 


?>