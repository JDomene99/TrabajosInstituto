<?php

    if(isset($_GET['id_rol']) ){
        UserRepository::updateRol($_GET['id_rol']);
    }

    $userList = UserRepository::getRoleAllUserRegister();
    require_once("views/roleListView.php");
?>