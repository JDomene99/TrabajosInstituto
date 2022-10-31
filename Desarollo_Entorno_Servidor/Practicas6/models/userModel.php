<?php

class User{
    private $id;
    private $name;
    private $password;
    private $role;
    
    public function __construct($datos){
        $this->id = $datos['id'];
        $this->name = $datos['name'];
        $this->image = $datos['image'];  
        $this->role = $datos['id_rol'];        
    }   

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }

    public function getRol(){
        $rol = '';
        if($this->role == 1){
            $rol = 'admin';
        }
        else{
            $rol = 'normal';
        }
        return $rol;
    }

    public function getpassword(){
        return $this->password;
    }

    public function getImage(){
        return $this->image;
    }
    public function __toString(){
        return $this->name;
    }
    
} 
// 
?>