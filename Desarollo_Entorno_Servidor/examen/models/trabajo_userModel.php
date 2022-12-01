<?php

class TrabajoUser{
    
    private $id_trabajo_us;
    private $id_trabajo;
    private $id_user; 
    private $estado;
    private $date;   
   

    public function __construct ($datos){
        $this->id_trabajo_us = $datos['id_trabajo_user'];
        $this->estado = $datos['estado'];  
        $this->date = $datos['date'];    
        $this->id_trabajo = TrabajoRepository::getTrabajoById($datos['id_trabajo']); 
        $this->id_user =UserRepository::getUserById($datos['id_user']);        
    }   

    public function getIdTrabajoUser(){
        return $this->id_trabajo_us;
    }


    public function getIdTrabajo(){
        return $this->id_trabajo;
    }

   
    public function getIdUser(){
        return $this->id_user;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getDate(){
        return $this->date;
    }
    

   
} 

?>