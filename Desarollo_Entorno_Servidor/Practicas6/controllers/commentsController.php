<?php

if( isset($_POST['commentArticle']) ) {
    if($_POST['commentArticle']){
        $comment = $_POST['commentArticle'];
        $idUser=$_SESSION['user']->getId();
        $idArticle = $_GET['article'];
        $db = Conectar::conexion();
        $fechaActual = date('d-m-Y H:i:s');
        $result = $db->query("INSERT into comments(idUser,idArticle,comment,hora) VALUES( '$idUser', '$idArticle' ,'$comment', '$fechaActual' ) "); 
    }
   
    
}

?>