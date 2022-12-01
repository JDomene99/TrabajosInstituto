<?php

    if(isset($_POST['diaInforme']) && isset($_POST['startDate'])){
        $informes = JornadaRepository::getInformesByDay($_POST['startDate']);
    }

    // if(isset($_POST['diaInforme2']) && isset($_POST['startDate'] && isset($_POST['userName']))){
    //     $idUser = UserRepository::getUserByName($_POST['userName']);
    //     $informes = JornadaRepository::getInformesByDayAndUser(($_POST['startDate']));
    // }
   
    
    require_once("views/informesView.phtml");
    die();
?>

     