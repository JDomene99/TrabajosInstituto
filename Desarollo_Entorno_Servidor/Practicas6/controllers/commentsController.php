<?php

if( isset($_POST['commentArticle']) ) {
    $comment = $_POST['commentArticle'];
    foreach($articleFinal as $item){
        $idUser = $item->getAutor()->getId();
        $idArticle = $item->getIdArticle();
    }
    
    $db = Conectar::conexion();
    $fechaActual = date('d-m-Y H:i:s');
    $result = $db->query("INSERT into comments(idUser,idArticle,comment,hora) VALUES( '$idUser', '$idArticle' ,'$comment', '$fechaActual' ) "); 
    require_once("views/articleView.php");
    return;
}


?>