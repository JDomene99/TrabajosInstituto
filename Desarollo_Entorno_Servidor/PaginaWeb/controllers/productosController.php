<?php
  
  if((isset($_GET['newProducto']))){
    
    if(isset($_POST['name_producto']) && isset($_POST['descripcion_producto'])  && isset($_POST['precio_producto'])  && isset($_POST['stock_producto'])  && $_FILES["imagen_producto"]   ) {
      ProductosRepository::createProducto($_POST['name_producto'],$_POST['descripcion_producto'],$_POST['precio_producto'],$_POST['stock_producto'],$_SESSION['user']->getId(),$_FILES['imagen_producto']);
    }
    
   
  } 
  // $itemCarrito = 0;
  //añadimos un producto
  if(isset($_GET['producto'])){
    // $itemCarrito = 1;
    OrderRepository::createOrderLineItem($_SESSION['Order']->getIdOrder(),$_GET['producto']);
    header('Location: index.php');
    return;
  }   
  

  
  require_once("views/createProducto.phtml");
  return;
  
  
?>