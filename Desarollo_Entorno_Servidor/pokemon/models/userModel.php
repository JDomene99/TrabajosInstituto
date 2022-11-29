<?php

class User{
    private $id;
    private $name;
    private $password;
    private $id_rol;
    
    public function __construct($datos){
        $this->id = $datos['id_user'];
        $this->name = $datos['name'];
        $this->id_rol = $datos['id_rol'];        
    }   

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }

    public function getRol(){
        return $this->id_rol;
    }

    public function getpassword(){
        return $this->password;
    }

    public function __toString(){
        return $this->name;
    }
    
} 

?>