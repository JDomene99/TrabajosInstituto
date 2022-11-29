<?php

class Pokedex{
    
    private $id_pokedex;
    private $id_maestro;
    private $id_pokemon;  
    
   

    public function __construct ($datos){
        $this->id_pokedex = $datos['id_pokedex'];  
        $this->id_maestro = UserRepository::getUserById($datos['id_maestro']); 
        $this->id_pokemon =PokemonRepository::getPokemonById($datos['id_pokemon']); 
       
    }   

    public function getIdPokedex(){
        return $this->id_pokedex;
    }

    public function getPokemon(){
        return $this->id_pokemon;
    }

   
    public function getMestro(){
        return $this->id_pokemon;
    }

   
} 

?>