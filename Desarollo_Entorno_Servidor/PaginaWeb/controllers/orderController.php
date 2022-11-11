<?php
   
   
  $orderItems = OrderRepository::getOrderItems($_SESSION['Order']->getIdOrder());  
  $precioFinal =OrderRepository::getTotalPriceByOrder($orderItems,$_SESSION['Order']->getIdOrder());

  if((isset($_GET['confirmarPedido']))){
    OrderRepository::confirmOrder($_SESSION['Order']->getIdOrder());
    $orderItems = [];
    OrderRepository::createOrder($_SESSION['user']->getId());
    header('Location: index.php');  
  }
  

  require_once("views/carritoView.phtml");
  die();
  
  
?>