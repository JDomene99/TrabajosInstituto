<?php

class Order{

    private $id_order;
    private $precioTotal;
    private $id_user;
    
    public function __construct ($datos){
        $this->id_order =$datos['id_order'];
        $this->precioTotal =$datos['precioTotal'];
        $this->id_user = UserRepository::getUserById($datos['id_user']); 
      
    }   

    public function getIdOrder(){
        return $this->id_order;
    }
    public function getIdUser(){
        return $this->id_user;
    }
    



} 

?>