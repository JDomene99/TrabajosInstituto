<?php

    if(isset($_POST['sendText'])){

        
        if(isset($_POST['textChat']) && isset($_POST['idSalaToMessage'])){
            MessageRepository::insertMessage($_POST['textChat'],$_SESSION['user']->getId(),$_POST['idSalaToMessage']);
            
        }
        
        
       
       
    }



?>