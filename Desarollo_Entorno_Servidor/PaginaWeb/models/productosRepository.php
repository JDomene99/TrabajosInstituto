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


   
   



    public static function getProductos(){
        $db = Conectar::conexion();
        $q = "SELECT * FROM productos";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()){
            $productos[] = new producto($datos);   
        }
        return $productos;
    }

    // public static function ocultarproducto($id_producto){
    //     $db = Conectar::conexion();
    //     $result = $db->query("UPDATE productos SET visible = '0' WHERE productos.`id_producto` = $id_producto"); 
    // }

} 
?>