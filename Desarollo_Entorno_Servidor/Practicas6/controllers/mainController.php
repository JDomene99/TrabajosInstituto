<?php
//botones por get
//action form por post
//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/articleModel.php');
require_once('models/articleRepository.php');
require_once('models/commentsModel.php');
require_once('models/commetsRepository.php');
require_once('models/roleModel.php');
require_once('models/roleRepository.php');
require_once('models/valoracionModel.php');
require_once('models/valoracionRepository.php');
session_start();

$articleNumero = ArticleRepository::getCountarticle();
//cargamos los articulos
$article = [];
if(!isset($_GET['findArticleButton']) ){
    $article = ArticleRepository::getArticle(1);
   
} 
//si llama a una pagina
if(isset($_GET['pagina'])){ 
    if($_GET['pagina']> 1 || $_GET['pagina'] <$articleNumero){        
        $article =ArticleRepository::getArticle($_GET['pagina']);
    }
}

//cargamos la lista de articulos de la busqueda
if(isset($_GET['textToFind'])){
    $articleNumero = ArticleRepository::getCountarticleFindArticle($_GET['textToFind']); 
    $article = ArticleRepository::findArticle($_GET['textToFind'],1);
    if(isset($_GET['pagina']) && $_GET['pagina']> 1 && $_GET['pagina'] <= $articleNumero){ 
        $article = ArticleRepository::findArticle($_GET['textToFind'],$_GET['pagina']);
    }
}

//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $datos['image']="";
    $datos['id_rol']="2";
    $_SESSION['user'] = new User($datos);
}


//creamos los comentarios
if(isset($_GET['comment']) ) {
    require_once('controllers/commentsController.php');
}

//crear articulo
if(isset($_GET['createArticle'])){
    require_once('controllers/articleController.php');
}


if(isset($_GET['valoracion'])){
    if(isset($_GET['article'])){ 
        require_once('controllers/valoracionController.php'); 
    }
}

//ir al articulo seleecionado
if(isset($_GET['article'])){ 
    require_once('controllers/articleController.php');
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