<?php

class Rol{
    private $id_rol;
    private $name;
    
    public function __construct($datos){
        $this->role = $datos['id_rol']; 
        $this->name = $datos['name'];  
               
    }   

    public function getIdRol(){
        return $this->id;
    }
    
    public function getNameRol(){
        return $this->name;
    }    
} 
?>