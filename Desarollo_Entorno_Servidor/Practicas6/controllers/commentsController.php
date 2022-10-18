<?php

if( isset($_POST['commentArticle']) ) {
    $comment = $_POST['commentArticle'];
    $idUser=$_SESSION['user']->getId();
    $idArticle = $_GET['article'];
    $db = Conectar::conexion();
    $fechaActual = date('d-m-Y H:i:s');
    $result = $db->query("INSERT into comments(idUser,idArticle,comment,hora) VALUES( '$idUser', '$idArticle' ,'$comment', '$fechaActual' ) "); 
    
}

if(isset($_GET['createArticle'])){
    
    if( isset($_POST['tituloArticle']) && isset($_POST['textArea']) && isset($_POST['imageArticle']) ) {
        $texto = $_POST['commentArticle'];
        $titulo= $_POST['tituloArticle'];
        $idArticle = $_POST['article'];
        $image = $_POST['imageArticle'];
        $idUser=$_SESSION['user']->getId();
        $db = Conectar::conexion();
        $fechaActual = date('d-m-Y H:i:s');
        $result = $db->query("INSERT into article(idArticle,date,seccion,tittle,imagen,autor) VALUES( null,'$fechaActual', '$texto' ,'$titulo', '$image','$idUser' ) "); 
       
    }
    require_once("views/createArticle.phtml");
    return; 
}

?>