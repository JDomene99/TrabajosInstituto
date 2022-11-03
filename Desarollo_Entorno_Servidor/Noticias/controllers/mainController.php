<?php
//botones por get
//action form por post
//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/noticiasModel.php');
require_once('models/noticiasRepository.php');
require_once('models/valoracionModel.php');
require_once('models/valoracionRepository.php');
session_start();

//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id_user']=0;
    $datos['name']="";
    $datos['id_rol']=1;
    $_SESSION['user'] = new User($datos);
}

//carga toda las noticias
$noticias = NoticiasRepository::getNoticias();

//Vista de crear noticia
if(isset($_GET['newNoticia'])){
    require_once('controllers/noticiasController.php');
}


//Vista de crear valoracion
if(isset($_GET['valoracion'])){
    require_once('controllers/valoracionController.php');
   
}

//ocultarValoracion
if((isset($_GET['ocultarNotica']))){
    require_once('controllers/noticiasController.php');
}
//ir al form de login
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  


require_once("views/mainView.phtml");
?>