<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/roleModel.php');
require_once('models/roleRepository.php');
require_once('models/jornadaModel.php');
require_once('models/jornadaRepository.php');
require_once('models/trabajoModel.php');
require_once('models/trabajoRepository.php');
require_once('models/trabajo_userModel.php');
require_once('models/trabajo_userRepository.php');

session_start();

$trabajos = TrabajoRepository::getAllTrabajos();
//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id_user']=0;
    $datos['name']="";
    $datos['id_rol']="1";
    $datos['dni']=0;
    $datos['apellidos']="";
    $datos['email']="1";
    $datos['telefono']="1";
    $_SESSION['user'] = new User($datos);
}


//crear articulo
if(isset($_GET['jornada'])){
    require_once('controllers/jornadaController.php');
}

//creamos los comentarios
if(isset($_GET['addTrabajo']) ) {
    require_once('controllers/trabajoController.php');
}

//ir al articulo seleecionado
if(isset($_GET['informes'])){ 
    require_once('controllers/informesController.php');
}

 
//editar role
if(isset($_GET['role'])) {
    require_once("controllers/roleController.php");
} 

//ir al form de login
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
} 


require_once("views/mainView.phtml");
?>