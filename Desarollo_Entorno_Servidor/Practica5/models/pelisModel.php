<?php

class Pelis{
    
    private $name;
    private $date;
    private $imagen;

    public function __construct ($datos){
        $this->name = $datos['name'];
        $this->date = $datos['date'];
        $this->imagen = $datos['imagen'];        
    }   

    public function getName(){
        return $this->name;
    }
    
    public function getDate(){
        return $this->date;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function __toString(){
        return $this->name."(".$this->date.")";
    }
    public function getLink(){
        return $this->imagen;
    }
} 

?>