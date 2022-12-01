<?php

    if(isset($_GET['logout']) ){
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    if(isset($_POST['logeo'])){
         if( isset($_POST['dniUser']) && isset($_POST['password']) ){
            UserRepository::loginUser($_POST['dniUser'],$_POST['password']);
            $message = TrabajoUserRepository::getUserSinContestar();
            foreach($message as $msg){
                if($msg == $_SESSION["user"]->getId()){
                    echo 'tienes trabajos pendientes que aceptar';
                }
            }
            require_once("views/mainView.phtml");
            die();
        }
    }

    if(isset($_POST['registro'])){
        if( isset($_POST['name']) && isset($_POST['apellidos']) && isset($_POST['dni']) && isset($_POST['email']) && isset($_POST['telefono'])  && isset($_POST['password']) && isset($_POST['password2'])){
            if($_POST['password2'] == $_POST['password'] ){
                
                UserRepository::registerUser($_POST['name'],$_POST['apellidos'],$_POST['email'],$_POST['telefono'],$_POST['password'],$_POST['dni']);
                require_once("views/mainView.phtml");
                die();
                
            }
            else{
                echo ' Las contraseñas no coinciden';
            }
        }
    }

    if(isset($_GET['editProfile'])){
        
        $allUser = UserRepository::getAllUser();
        
        if(isset($_GET['userId'])){
            
            if(isset($_POST['editUserButton']) && isset($_POST['name']) && isset($_POST['apellidos']) && isset($_POST['dni']) && isset($_POST['email']) && isset($_POST['telefono'])){
                UserRepository::updateUser($_GET['userId'],($_POST['name']),($_POST['apellidos']),$_POST['email'],$_POST['telefono'],$_POST['dni']);
            }
            
        }

       
        require_once("views/editUserView.phtml");
        die();
    }
    

    require_once("views/loginView.phtml");

?>