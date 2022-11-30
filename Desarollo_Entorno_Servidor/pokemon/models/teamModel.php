<?php

class Team{
    
    private $id_team;
    private $id_maestro;
    private $id_pokemon; 
    private $name;   
    
   

    public function __construct ($datos){
        $this->id_team = $datos['id_team'];  
        $this->id_maestro = UserRepository::getUserById($datos['id_maestro']); 
        $this->name = $datos['name'];  
        
       
    }   

    public function getIdTeam(){
        return $this->id_team;
    }

    public function getName(){
        return $this->name;
    }

    public function getPokemon(){
        return $this->id_pokemon;
    }

   
    public function getMestro(){
        return $this->id_pokemon;
    }

   
} 

?>