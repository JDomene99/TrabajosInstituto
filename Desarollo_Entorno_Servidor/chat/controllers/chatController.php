<?php

    if(isset($_POST['sendText'])){

        if(isset($_POST['textChat'])){
            MessageRepository::insertMessage($_POST['textChat'],$_SESSION['user']->getId());
            require_once("views/mainView.phtml");
            return;
        }
        
        
       
       
    }



?>