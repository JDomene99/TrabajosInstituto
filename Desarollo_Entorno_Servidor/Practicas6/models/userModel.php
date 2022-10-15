<?php

class User{
    private $id;
    private $name;
    private $password;
    // private $imagen;
    
    public function __construct($datos){
        $this->id = $datos['id'];
        $this->name = $datos['name'];
        // $this->password = $datos['password'];
        $this->image = $datos['image'];         
    }   

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }

    public function getpassword(){
        return $this->password;
    }

    public function getImage(){
        return $this->image;
    }
    
} 
// 
?>