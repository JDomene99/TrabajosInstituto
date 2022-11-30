<?php

    if(isset($_GET['id_rol']) ){
        RolRepository::updateRol($_GET['id_rol']);
    }
    $maxPokemonUser = PokemonRepository::getTheMostUserCreatePokemon();
    $maxTeamUser  = TeamRepository::getTheMostUserCreateTeam();
    $userList = RolRepository::getRoleAllUserRegister();
    require_once("views/roleListView.php");
?>