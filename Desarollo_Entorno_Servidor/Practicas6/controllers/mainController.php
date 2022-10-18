<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/articleModel.php');
require_once('models/articleRepository.php');
require_once('models/commentsModel.php');
require_once('models/commetsRepository.php');
session_start();

//cargamos los articulis
$article = articleRepository::getArticle();


//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $_SESSION['user'] = new User($datos);
}


//creamos los comentarios
if( isset($_GET['comment']) ) {
    require_once('controllers/commentsController.php');
}

//crear articulo
if(isset($_GET['createArticle'])){
    require_once('controllers/commentsController.php');
}


//ir al articulo seleecionado
if(isset($_GET['article'])){ 
    require_once('controllers/articleController.php');
    
}



//ir al form de login
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  
// 
// cargar la vista
require_once("views/mainView.phtml");
?>