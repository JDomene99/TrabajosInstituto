<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/commentsModel.php');
require_once('models/articleModel.php');
require_once('models/userRepository.php');
session_start();

//cargamos los articulis
require_once('models/articleRepository.php');
$article = articleRepository::getArticle();
//cargamos los comentarios
require_once('models/commetsRepository.php');
$comments = commentsRepository::getComments();
if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $_SESSION['user'] = new User($datos);
}


if(isset($_SESSION['sendComment'])){
    require_once('models/commentsController.php');
    $comments = commentsRepository::getComments();
    
}

if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  
// 
// cargar la vista
require_once("views/mainView.phtml");
?>