<?php

    if(isset($_GET['logout']) ){
        unset($_SESSION['user']);
        header('Location: index.php');

    }

    if(isset($_POST['logeo'])){
        if( isset($_POST['user']) && isset($_POST['password']) ){
            $db = Conectar::conexion();
            $q = "SELECT * FROM users WHERE name= '".$_POST['user']."'";
            $result = $db->query($q);
            if($datos = $result->fetch_assoc()) {
                if($datos['password'] == $_POST['password']) {
                    $_SESSION['user'] = new User($datos);
                    require_once("views/mainView.phtml");
                    return;
                }
            
            }

        }
    }

    if(isset($_POST['registro'])){
        if( isset($_POST['user']) && isset($_POST['password']) && isset($_POST['password2'])){
            if(isset($_POST['password2']) == isset($_POST['password']) ){
                $db = Conectar::conexion();
                $result = $db->query("SELECT * FROM users WHERE name = '".$_POST['user']."' ");
                // var_dump($datos);
                if(!$datos = $result->fetch_assoc()) {
                    $nombre = $_POST['user'];
                    $passwordUser = $_POST['password'];
                    $result = $db->query("INSERT into users(id,name,password) VALUES( null, '$nombre' , '$passwordUser' ) ");    
                    require_once("views/mainView.phtml");
                    return;
                    
                }
            
            }
            
        }
    }

    require_once("views/loginView.phtml");
    // 

?>