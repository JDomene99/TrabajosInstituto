<?php

class Producto{

    private $idProducto;
   
    
   

    public function __construct ($datos){
        $this->idProducto = ProductoRepository::getProduct($datos['id_producto']); 
      
    }   

    public function getProducto(){
        return $this->autor;
    }



} 

?>