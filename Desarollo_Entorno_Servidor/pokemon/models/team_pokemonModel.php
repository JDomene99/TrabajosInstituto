<?php

class TeamPokemon{
    
    private $id_team_pokemon;
    private $id_team;
    private $id_pokemon; 
    private $name;   
    
   

    public function __construct ($datos){
        $this->id_team_pokemon = $datos['id_team_pokemon'];  
        $this->id_team = TeamRepository::getTeamById($datos['id_team']); 
        $this->id_pokemon =PokemonRepository::getPokemonByIdTeam($datos['id_pokemon']);        
    }   

    public function getIdTeam(){
        return $this->id_team_pokemon;
    }


    public function getPokemon(){
        return $this->id_pokemon;
    }

   
    public function getMestro(){
        return $this->id_pokemon;
    }

   
} 

?>