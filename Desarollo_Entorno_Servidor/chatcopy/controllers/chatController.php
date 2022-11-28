<?php

    if(isset($_POST['sendText'])){

        
        if(isset($_POST['textChat']) && isset($_POST['idSalaToMessage'])){
            MessageRepository::insertMessage($_POST['textChat'],$_SESSION['user']->getId(),$_POST['idSalaToMessage']);
            
        }
        
        if(isset($_POST['idChat']) && isset($_POST['textChat'])){
            ChatRepository::insertMessageToPrivateChat($_POST['idChat'],$_POST['textChat'],$_SESSION['user']->getId());  
            $chat = ChatRepository::getMessagesByChat($_GET['idChat']);            
        }
        
       
       
    }



?>