<?php


    if( isset($_GET['valoracion']) && isset($_GET['article']) ){
        ValoracionRepository::setValoracion($_SESSION['user']->getId(),$_GET['article'],$_GET['valoracion']);
        require_once("controllers/mainController.php");
        return;
    }
    
    die();  
?>

     