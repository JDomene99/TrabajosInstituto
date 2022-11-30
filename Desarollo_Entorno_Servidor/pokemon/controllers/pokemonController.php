<?php
  
   
    //addPokemon
    if(isset($_POST['insertPokemon'])){
        if( isset($_POST['namePokemon']) && isset($_POST['typePokemon']) && $_FILES["fileToUpload"]) {       
            PokemonRepository::addPokemon($_POST['typePokemon'],$_POST['namePokemon'],$_FILES["fileToUpload"],$_SESSION['user']->getId());
        }
    }
    
   
      
       
    
    require_once("views/addPokemonView.phtml");
    return;

?>