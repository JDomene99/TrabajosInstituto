<?php


    if(isset($_GET['like']) && $_SESSION['user']->getName()!= "" ){
        ValoracionRepository::setLikeValoracion($_SESSION['user']->getId(),$_GET['like']);
        header("Location: index.php");
    }

    if(isset($_GET['dislike']) && $_SESSION['user']->getName()!= "" ){
        ValoracionRepository::setDislikeValoracion($_SESSION['user']->getId(),$_GET['dislike']);
        header("Location: index.php");
    }
   
?>

     