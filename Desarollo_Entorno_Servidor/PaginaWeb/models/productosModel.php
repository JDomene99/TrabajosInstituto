<?php

class Producto{

    private $idProducto;
    private $autor;
    private $name; 
    private $descripcion;  
    private $precio;
    private $stock; 
    private $imagen; 
    
   

    public function __construct ($datos){
        $this->idProducto = $datos['id_producto']; 
        $this->autor = UserRepository::getUserById($datos['autor']); 
        $this->name = $datos['name'];
        $this->descripcion = $datos['descripcion'];
        $this->stock = $datos['stock'];
        $this->precio = $datos['precio'];
        $this->imagen = $datos['imagen'];
      
    }   

    public function getAutor(){
        return $this->autor;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getName(){
        return $this->name;
    }

    public function getImage(){
        return $this->imagen;
    }

    public function getVisibilidad(){
        return $this->visible;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getIdProducto(){
        return $this->idProducto;
    }


} 

?>