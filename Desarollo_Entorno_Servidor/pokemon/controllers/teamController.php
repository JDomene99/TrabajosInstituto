<?php



    if(isset($_POST['insertPokemon']) && isset($_POST['nameTeam'])){
        TeamRepository::updateTeam($_SESSION['team']->getIdTeam(),$_POST['nameTeam']); 
             
    }
    $name = TeamRepository::CheckName($_SESSION['team']->getIdTeam());
    $pokemon = PokemonRepository::getPokemonByMaestro($_SESSION['user']->getId());
    // $teamAdded = TeamPokemonRepository::getTeamPokemonAdded($_SESSION['team']->getIdTeam());
    
    if(isset($_GET['pokemon_id'])){
        if(TeamPokemonRepository::checkPokemonTeam_Pokemon($_SESSION['team']->getIdTeam())){
            TeamPokemonRepository::insertPokemonInTeam_Pokemon($_SESSION['team']->getIdTeam(),$_GET['pokemon_id']);
        }
        else{
            $control = false;
            unset($_SESSION['team']);
            TeamRepository::createTeam($_SESSION['user']->getId());
            echo 'Ya hay 5 pokemon en tu equipo';
            require_once("views/mainView.phtml");

            
            
        }
        
    }
   

    
    require_once("views/teamView.phtml");
    die();

?>