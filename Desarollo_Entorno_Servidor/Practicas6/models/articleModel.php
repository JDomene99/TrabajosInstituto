<?php

class Article{

    private $autor;
    private $date;
    private $seccion; 
    private $tittle;   

    public function __construct ($datos){
        // $this->autor = ;
        $this->autor = $datos['autor']; 
        $this->date = $datos['date']; 
        $this->seccion = $datos['seccion']; 
        $this->tittle = $datos['tittle'];    
    }   

    public function getAutor(){
        return $this->autor;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTittle(){
        return $this->tittle;
    }

    public function getSeccion(){
        return $this->seccion;
    }
    // 
} 

?>