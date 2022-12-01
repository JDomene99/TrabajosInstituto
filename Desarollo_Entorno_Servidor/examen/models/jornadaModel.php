<?php

class Jornada{

    private $id_jornada;
    private $id_user;
    private $startDate;
    private $finishDate;
    private $incidencia;

    public function __construct ($datos){
        $this->id_jornada = $datos['id_jornada']; 
        $this->id_user = UserRepository::getUserById($datos['id_user']); 
        $this->startDate = $datos['startDate']; 
        $this->finishDate = $datos['finishDate']; 
        $this->estado = $datos['estado']; 
        $this->incidencia = $datos['incidencia']; 
           
    }   

    public function getIdJornada(){
        return $this->id_jornada;
    }

    public function getIncidencia(){
        return $this->incidencia;
    }
    
    public function getUser(){
        return $this->id_user;
    }


    public function getStartDate(){
        return $this->startDate;
    }

    public function getFinishDate(){
        return $this->finishDate;
    }
    

} 

?>