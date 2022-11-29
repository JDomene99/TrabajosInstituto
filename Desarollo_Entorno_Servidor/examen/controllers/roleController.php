<?php

    if(isset($_GET['id_rol']) ){
        RolRepository::updateRol($_GET['id_rol']);
    }

    $userList = RolRepository::getRoleAllUserRegister();
    require_once("views/roleListView.php");
?>