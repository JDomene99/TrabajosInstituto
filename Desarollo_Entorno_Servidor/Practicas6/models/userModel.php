<?php

class User{
    private $id;
    private $name;
    private $password;
    // private $imagen;
    
    public function __construct ($datos){
        // $this->id = $datos['id'];
        $this->name = $datos['name'];
        $this->password = $datos['password'];
        // $this->name = $datos['imagen'];         
    }   

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public static function getUserById($id){
       
        $db = Conectar::conexion();
        $q = "SELECT * FROM user where name = '".$id."' ";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $user[] = new User($datos);
        }   
        return $user;
       
        
    }
} 
// 
?>