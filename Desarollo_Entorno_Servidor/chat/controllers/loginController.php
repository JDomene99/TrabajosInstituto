<?php

    if(isset($_GET['checkTime'])){        
        echo UserRepository::checkTimeUser();
        $usersConectedInfo = UserRepository::getUserInfoConected();
        if(isset($_GET['close'])){
            header('Location: index.php');
        }
    
        require_once("views/mainView.phtml");
        die();
        
    }

    

    if(isset($_GET['logout']) ){
        userRepository::updateToDesconect($_SESSION['user']->getId());
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    if(isset($_POST['logeo'])){
         if( isset($_POST['user']) && isset($_POST['password']) ){
            UserRepository::loginUser($_POST['user'],$_POST['password']);
            header('Location: index.php');
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