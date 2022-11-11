<?php

class OrderRepository{
    
    public static function createOrder($user){  
        $db = Conectar::conexion();            
        $result = $db->query("INSERT INTO order2 (id_order, precioTotal, id_user,estado) VALUES (NULL, '0', '$user', 'pendiente') ");
        $idOrder = $db->insert_id;
        
        $resutl2 = $db->query("SELECT * FROM order2 WHERE id_order= '".$idOrder."'");
        if($datos = $resutl2->fetch_assoc()) {
            $_SESSION['Order'] = new Order($datos);
        }
    
        
    } 

    public static function createOrderLineItem($id_order,$id_product){
         //condicion para ver si hay stock
        if( ProductosRepository::getStockByProduct($id_product)){
            $db = Conectar::conexion();            
            $result = $db->query("INSERT INTO orderlineitem (id_orderLineItem, id_order, id_product, cantidad) VALUES (NULL, '$id_order', '$id_product', '1') ");
        }
       
        
    }
    

    public static function getOrderById($id_order){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM order2 where id_order = '".$id_order."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $order = new Order($datos);
        return $order;  
        
    }
    
    public static function getOrderItems($id_order){  
        $db = Conectar::conexion();
        $q = "SELECT * FROM orderlineitem where id_order = '".$id_order."' ";
        $result = $db->query($q);
        $orderItem = [];
        while($datos = $result->fetch_assoc()) {
            if(!isset($orderItem[$datos['id_product']]))
            $orderItem[$datos['id_product']] = new OrderLineItem($datos);
            else{
                $orderItem[$datos['id_product']]->aumentarCantidad();
            }
        } 
        return $orderItem;
        
    }
    
    public static function getProductsByProductId($id_product){  
        $db = Conectar::conexion();
        $q = "SELECT name, precio from productos WHERE id_producto IN ( SELECT id_producto from orderlineitem Where Id_producto = '$id_product')";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()) {
            $products[] = new Producto($datos);
        } 
        return $products;
        
    }   
    
    public static function getTotalPriceByOrder($orderItemArray,$id_order){
        $suma = 0;
        foreach($orderItemArray as $orderItem){
            $suma += ($orderItem->getCantidad() *$orderItem->getProduct()->getPrecio())+$suma;
        }
        $db = Conectar::conexion();
        $result = $db->query("UPDATE order2 SET precioTotal = '$suma' WHERE order2.id_order = '$id_order'");

        return $suma;
    }   

    public static function confirmOrder($id_order){
        $db = Conectar::conexion();
        $result = $db->query("UPDATE order2 SET estado = 'confirmado' WHERE order2.id_order = '$id_order' ");
    }

}   



?>
