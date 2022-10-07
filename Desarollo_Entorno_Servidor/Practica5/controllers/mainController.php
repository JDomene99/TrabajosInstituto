<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/pelisModel.php');
session_start();

//cargamos las pelis+
require_once('models/PelisRepository.php');

$pelis = [];
if(!isset($_GET['Busca']) ){
    $pelis = PelisRepository::getPelis();
}
//cargamos la lista de peliculas de la busqueda
if( isset($_POST['Busca']) && isset($_POST['busqueda']) ){
    $pelis = PelisRepository::findPelis($_POST['busqueda']);
}


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