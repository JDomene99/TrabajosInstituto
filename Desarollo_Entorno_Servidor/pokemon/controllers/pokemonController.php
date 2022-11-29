<?php
  
   
    //addPokemon
    if(isset($_POST['insertPokemon'])){
        if( isset($_POST['namePokemon']) && isset($_POST['typePokemon']) && $_FILES["fileToUpload"]) {
           
            PokemonRepository::addPokemon($_POST['typePokemon'],$_POST['namePokemon'],$_FILES["fileToUpload"],$_SESSION['user']->getId());
        }
    }
    
   
      
       
    
    require_once("views/addPokemonView.phtml");
    return;
    // //edtiar articulos
    // if(isset($_POST['sendDataArticle']) && isset($_POST['editTittle']) && isset($_POST['editTextArea']) && isset($_FILES["editImage"])  ){          
    //     ArticleRepository::editArticle( $_GET['article'],$_POST['editTextArea'],$_POST['editTittle'],$_FILES["editImage"]); 
    // }
    
    // //mostrar el articulo seleccionado
    // $articleFinal = ArticleRepository::getArticleById($_GET['article']);
    // require_once("views/articleView.php");
?>