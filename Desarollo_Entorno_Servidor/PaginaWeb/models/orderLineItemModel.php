<?php

class OrderLineItem{

    private $id_orderLineItem;
    private $id_order;
    private $product;
    private $cantidad;
    
    public function __construct ($datos){
        $this->id_orderLineItem = $datos['id_orderLineItem'];
        $this->id_order = OrderRepository::getOrderById($datos['id_order']);
        $this->product =ProductosRepository::getProductById($datos['id_product']);
        $this->cantidad =$datos['cantidad'];  
      
    }   

    public function getOrderLineItem(){
        return $this->id_orderLineItem;
    }

    public function aumentarCantidad(){
        $this->cantidad ++;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getProduct(){
        return $this->product;
    }



} 

?>