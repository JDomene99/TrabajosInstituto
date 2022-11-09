<?php

class ProductosRepository{


    public static function createProducto($tituloProducto, $descripcion_producto, $precio_producto, $stock_producto ,$autor ,$imagen_producto){

        $ruta = './views/imagenes/';
        $uploadfile = $ruta . basename($imagen_producto['name']);
        if (move_uploaded_file($imagen_producto['tmp_name'], $uploadfile)) {} 
        $imagen = $imagen_producto['name'];
        $db = Conectar::conexion();            
        $fechaActual = date('Y-m-d H:i:s');
        $result = $db->query("INSERT into productos(id_producto,name,descripcion,precio,stock,autor,date,imagen) VALUES( null,'$tituloProducto', '$descripcion_producto' ,'$precio_producto', '$stock_producto', '$autor', '$fechaActual' , '$imagen' ) "); 
    }

    // public static function getProductos(){
    //     $db = Conectar::conexion();
    //     $q = "SELECT * FROM productos";
    //     $result = $db->query($q);
    //     while($datos = $result->fetch_assoc()){
    //         $productos[] = new producto($datos);   
    //     }
    //     return $productos;
    // }

    public static function getProductos($numeroPagina){
        $numeroTotal = ProductosRepository::getCountProduct();
        
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM productos LIMIT $pagFinal , 3 ";
            $result = $db->query($q);
            while($datos = $result->fetch_assoc()) {
                $productos[] = new Producto($datos);
            } 
            return $productos;
        }
    }
    public static function getCountProduct(){
        $db = Conectar::conexion();
        $q = "SELECT Count(*) FROM productos LIMIT 0,3 ";
        $result = $db->query($q);
        $totalProductFind = (int)$result->fetch_column();
        return ceil($totalProductFind/3);
    }


    public static function getStockByProduct($id_product){
        $db = Conectar::conexion();
        $q = "SELECT stock FROM productos where id_producto = '$id_product'";
        $result = $db->query($q);
        $datos = $result->fetch_row();
        $stock = $datos[0];
        return $stock;
    }


    public static function getCountProductFind($name){
        $db = Conectar::conexion();
        $q = "SELECT Count(*) FROM productos where name LIKE '"."%".$name."%"."' LIMIT 0,3 ";
        $result = $db->query($q);
        $totalProductFind = (int)$result->fetch_column();
        return ceil($totalProductFind/3);
    }

    // public static function findArticle($name, $numeroPagina){
    //     $numeroTotal = ProductosRepository::getCountProduct($name);
    //     if($numeroPagina <= $numeroTotal){
    //         $pagFinal = 3*($numeroPagina-1);
    //         $db = Conectar::conexion();
    //         $q = "SELECT * FROM productos where name LIKE '"."%".$tittle."%"."' LIMIT $pagFinal,3 ";
    //         $result = $db->query($q);
    //         $productos=[];
    //         while($datos = $result->fetch_assoc()) {
    //             $productos[] = new Producto($datos);
    //         } 
    //         return $productos;  
    //     }      
    // } 

    // public static function ocultarproducto($id_producto){
    //     $db = Conectar::conexion();
    //     $result = $db->query("UPDATE productos SET visible = '0' WHERE productos.`id_producto` = $id_producto"); 
    // }

} 
?>