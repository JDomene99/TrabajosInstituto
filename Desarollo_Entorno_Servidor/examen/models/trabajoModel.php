<?php

class Trabajo{
    
    private $id_trabajo;
    private $id_user;
    private $description;  
    private $startDate; 
    private $finishDate; 
    private $sueldo;  
   

    public function __construct ($datos){
        $this->id_trabajo = $datos['id_trabajo'];  
        if(isset($datos['id_user'])){
            $this->id_user = UserRepository::getUserByIdTrabajo($datos['id_trabajo']); 
        }
        $this->startDate = $datos['startDate'];  
        $this->description = $datos['description']; 
        $this->finishDate = $datos['finishDate'];  
        $this->sueldo = $datos['sueldo']; 
       
    }   

    public function getIdTrabajo(){
        return $this->id_trabajo;
    }

    public function getUser(){
        return $this->id_user;
    }

    public function getDescription(){
        return $this->description;
    }
    

   
} 

?>