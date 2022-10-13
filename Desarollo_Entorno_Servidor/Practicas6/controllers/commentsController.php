<?php

if(isset($_POST['sendComment'])){
    $gi = 'hola';
    var_dump($gi);
}

if( isset($_POST['sendComment']) && isset($_POST['comment']) ){
    
    $comment = $_POST['comment'];
    $idComment = 
    $db = Conectar::conexion();
    $nombre = $_POST['user'];
    $passwordUser = $_POST['password'];
    $result = $db->query("INSERT into comments(idUser,comment) VALUES( null, '$comment' ) "); 
    require_once("views/mainView.phtml");
    return;
        
    
}
require_once("views/MainView.phtml");   
    
        
    // 

?>