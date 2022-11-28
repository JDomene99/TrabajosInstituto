<?php

    if(isset($_POST['addSala']) && isset($_POST['nameSala'])){

        SalaRepository::createSala($_SESSION['user']->getId(),$_POST['nameSala']);        
        header('Location: index.php');
       
    }

    if(isset($_GET['id_sala'])){
        $salaById = SalaRepository::getSalaById($_GET['id_sala']); 
        require_once("views/mainView.phtml");
        return;
       
    }

    if(isset($_GET['privateChat'])){
        //comprueba si ya existe un chat 
        if(ChatRepository::ckeckChat($_SESSION['user']->getId(),$_GET['privateChat'])){
            $chat = ChatRepository::findChat($_SESSION['user']->getId(),$_GET['privateChat']);
            
        }
        //si no existe lo crea
        else{
            $idChat = ChatRepository::createChat($_SESSION['user']->getId(),$_GET['privateChat']);     
            $chat = ChatRepository::getChatById($idChat);
        }

        
         
        require_once("views/privateChat.phtml");
        die();
          
    }

    
    
require_once('views/CreateSala.phtml');
die();
?>