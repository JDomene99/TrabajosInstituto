<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "paginaWeb");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>