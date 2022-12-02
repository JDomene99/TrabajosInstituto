<?php
  
    if(isset($_GET['addJornada'])) {
        if(JornadaRepository::checkJornada($_SESSION["user"]->getId())){
            JornadaRepository::createJornada($_SESSION["user"]->getId());
        }
        else{
            $message = '¿Jornada en curso,quieres lanzar una incidencia? <br/>';
        }
        if(isset($_GET['incidencia'])){
            $id_jornada = JornadaRepository::getIdJornada($_SESSION["user"]->getId());
            $date = date("Y-n-j H:i:s");
            JornadaRepository::editJornada($id_jornada,$date);
            header('Location: index.php');
        }
    }

    if(isset($_GET['close'])){
        echo 'dasd';
        $id_jornada = JornadaRepository::getIdJornada($_SESSION["user"]->getId());
        JornadaRepository::editJornada($id_jornada);
       
    
    }
    if(isset($_GET['cerrar'])){
        echo 'dasd';
        // $id_jornada = JornadaRepository::getIdJornada($_SESSION["user"]->getId());
        // JornadaRepository::editJornada($id_jornada);
        // header('Location: index.php');
    
    }

    require_once("views/mainView.phtml");
    die();
?>