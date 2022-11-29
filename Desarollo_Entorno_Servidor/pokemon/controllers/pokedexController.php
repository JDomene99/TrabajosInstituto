<?php

   
    if(isset($_GET['pokemonId'])){
        PokedexRepository::insertPokemonInPokedex($_GET['pokemonId'], $_SESSION['user']->getId());
    }
    

    

?>