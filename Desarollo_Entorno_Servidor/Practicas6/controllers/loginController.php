<?php

    if(isset($_GET['logout']) ){
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    if(isset($_POST['logeo'])){
         if( isset($_POST['user']) && isset($_POST['password']) ){
            UserRepository::loginUser($_POST['user'],$_POST['password']);
            require_once("views/mainView.phtml");
            die();
        }
    }

    if(isset($_POST['registro'])){
        if( isset($_POST['user']) && isset($_POST['password']) && isset($_POST['password2'])){
            if(isset($_POST['password2']) == isset($_POST['password']) ){
                UserRepository::registerUser($_POST['user'],$_POST['password']);
                require_once("views/mainView.phtml");
                die();
                
            }
        }
    }

    require_once("views/loginView.phtml");

?>