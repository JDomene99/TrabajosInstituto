<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/commentsModel.php');
session_start();

//cargamos las pelis+
require_once('models/commetsRepository.php');
$comments = commentsRepository::getComments();


if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $_SESSION['user'] = new User($datos);
}

if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  

// cargar la vista
require_once("views/mainView.phtml");
?>