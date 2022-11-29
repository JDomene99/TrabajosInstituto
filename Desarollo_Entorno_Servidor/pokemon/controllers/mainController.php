<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/roleModel.php');
require_once('models/roleRepository.php');
require_once('models/pokemonModel.php');
require_once('models/pokemonRepository.php');
require_once('models/pokedexModel.php');
require_once('models/pokedexRepository.php');
require_once('models/teamModel.php');
require_once('models/teamRepository.php');
require_once('models/team_pokemonModel.php');
require_once('models/team_pokemonRepository.php');

session_start();

//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id_user']=0;
    $datos['name']="";
    $datos['id_rol']="1";
    $_SESSION['user'] = new User($datos);
}


//paginacion
$articleNumero = PokemonRepository::getCountarticle();

//cargamos los articulos
$article = [];
if(!isset($_GET['findArticleButton']) ){
    $article = PokemonRepository::getArticle(1);
   
} 
//si llama a una pagina
if(isset($_GET['pagina'])){ 
    if($_GET['pagina']> 1 || $_GET['pagina'] <$articleNumero){        
        $article =PokemonRepository::getArticle($_GET['pagina']);
    }
}

//cargamos la lista de articulos de la busqueda
if(isset($_GET['textToFind'])){
    $articleNumero = PokemonRepository::getCountarticleFindArticle($_GET['textToFind']); 
    $article = PokemonRepository::findArticle($_GET['textToFind'],1);
    if(isset($_GET['pagina']) && $_GET['pagina']> 1 && $_GET['pagina'] <= $articleNumero){ 
        $article = PokemonRepository::findArticle($_GET['textToFind'],$_GET['pagina']);
    }
}

//crear articulo
if(isset($_GET['addPokemon'])){
    require_once('controllers/pokemonController.php');
}

//añadimos los pokemon a la pokedex
if(isset($_GET['addPokedex']) ) {
    require_once('controllers/pokedexController.php');
}


if(isset($_GET['team']) ) {
    require_once('controllers/teamController.php');
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