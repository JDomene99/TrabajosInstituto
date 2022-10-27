<?php


    if( isset($_GET['valoracion']) && isset($_GET['article']) ){
         
        ValoracionRepository::setValoracion($_GET['valoracion'],$_GET['article'] ,$_SESSION['user']->getId());
        require_once("views/mainView.phtml");
    }
    
    die();  
?>

     