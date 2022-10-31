<?php

if(isset($_GET['editIdRol']) ){
    $idUser=$_GET['editIdRol'];
    
    $db = Conectar::conexion();
    //si es admin lo haces normal   
    if(isset($_GET['normal'])){
        $result = $db->query("UPDATE users SET id_rol = '2' WHERE users.id = $idUser"); 
    }
    //si es normal lo haces admin
    else{
        $result = $db->query("UPDATE users SET id_rol = '1' WHERE users.id = $idUser"); 
    }    
}

$userList = UserRepository::getRoleAllUserRegister();
require_once("views/roleListView.php");
?>