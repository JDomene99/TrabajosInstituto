<?php

require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/roleModel.php');
require_once('models/roleRepository.php');
require_once('models/messageModel.php');
require_once('models/messageRepository.php');
session_start();

$messages = MessageRepository::getAllMessages();

if(isset($_POST['sendText'])) {
    require_once('controllers/chatController.php');
}  


//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id_user']=0;
    $datos['name']="";
    $datos['id_rol']=0;
    $_SESSION['user'] = new User($datos);
}

//modifico el rol
if(isset($_GET['role'])){
    require_once('controllers/roleController.php');
}


//ir al form de login
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  

require_once("views/mainView.phtml");
?>