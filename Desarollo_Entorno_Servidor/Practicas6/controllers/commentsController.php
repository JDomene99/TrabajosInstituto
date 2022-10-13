<?php

if( isset($_POST['sendComment']) && isset($_POST['comment']) ){
    echo 'hola';
    var_dump($_POST['comment']);
    $comment = $_POST['comment'];
    $idComment = 
    $db = Conectar::conexion();
    $nombre = $_POST['user'];
    $passwordUser = $_POST['password'];
    $fechaActual = date('d-m-Y H:i:s');
    $result = $db->query("INSERT into comments(idUser,idArticle,comment,hora) VALUES( null, null ,'$comment', '$_POSTfechaActual' ) "); 
    require_once("views/mainController.phtml");
    return;
        
    
}


?>