<?php
   
  $orderItems = OrderRepository::getOrderItems($_SESSION['Order']->getIdOrder());  
  $precioFinal =OrderRepository::getTotalPriceByOrder($orderItems,$_SESSION['Order']->getIdOrder());

  if((isset($_GET['confirmarPedido']))){
    OrderRepository::confirmOrder($_SESSION['Order']->getIdOrder());
    $orderItems = [];
    OrderRepository::createOrder($_SESSION['user']->getId());
    $productos =ProductosRepository::getProductos($_GET['pagina']);
  }

  if(isset($_GET['misPedidos'])){
    $pedidoHistory = OrderRepository::getOrderHistory($_SESSION['user']->getId());
    if(isset($_GET['idPedido'])){
      $orderItemHistory = OrderRepository::getOrderItems($_GET['idPedido']);
      $precioFinalHistory =OrderRepository::getTotalPriceByOrder($orderItemHistory,$_GET['idPedido']);
    } 
    
    require_once('views/misPedidosView.phtml');
  }
  
  require_once("views/carritoView.phtml");
  die();
  
  
?>