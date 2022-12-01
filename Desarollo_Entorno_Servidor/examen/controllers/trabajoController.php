<?php

    if( isset($_POST['addTrabajo']) && isset($_POST['descriptionTrabajo'])  && isset($_POST['startDate']) && isset($_POST['finishDate']) && isset($_POST['sueldo']) ) {
        TrabajoRepository::createTrabajo($_POST['descriptionTrabajo'],$_POST['startDate'],$_POST['finishDate'],$_POST['sueldo']);
        header('Location: index.php');
    }


    if(isset($_GET['addUser'])){
        if(isset($_GET['addWork'])){
            TrabajoUserRepository::insertTrabajoUserAcepted($_GET['addUser'],$_SESSION["user"]->getId());
            
        }
        if(isset($_GET['negateWork'])){
            TrabajoUserRepository::insertTrabajoUserNoAcepted($_GET['addUser'],$_SESSION["user"]->getId());
        }
       
        require_once("views/mainView.phtml");
        die();
    }
    

    if(isset($_GET['estado'])){
        if(isset($_GET['id_trabajo'])){
            TrabajoRepository::notVisible($_GET['id_trabajo']);
            
        }
        
        $trabajosUser = TrabajoUserRepository::getTrabajos();
        require_once("views/estadoTrabajoView.phtml");
        die();
    }
   

    require_once("views/createTrabajoView.phtml");
    die();
?>