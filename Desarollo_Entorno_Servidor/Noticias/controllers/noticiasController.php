<?php
  
  if((isset($_POST['createArticle']))){
    
    if(isset($_POST['tituloNoticia']) && isset($_POST['url']) ) {
      NoticiasRepository::createNoticia($_POST['tituloNoticia'],$_POST['url'],$_SESSION['user']->getId());
    }
  }
  
  if((isset($_GET['ocultarNotica']))){
    NoticiasRepository::ocultarNoticia($_GET['ocultarNotica']);
    header("Location: index.php");
  }
  require_once("views/createNoticia.phtml");
  return;
  
  
?>