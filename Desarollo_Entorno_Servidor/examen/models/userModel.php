<?php

class User{
    private $id;
    private $name;
    private $password;
    private $dni;
    private $telefono;
    private $email;
    private $apellidos;
    private $id_rol;
    
    public function __construct($datos){
        $this->id = $datos['id_user'];
        $this->name = $datos['name'];
        $this->dni = $datos['dni'];
        $this->telefono = $datos['telefono'];
        $this->email = $datos['email'];
        $this->apellidos = $datos['apellidos']; 
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

    public function getTrabajo(){
        return $this->id_trabajo;
    }

    public function getpassword(){
        return $this->password;
    }

    public function __toString(){
        return $this->name;
    }
    
} 

?>