<?php

class Pokemon{

    private $id_pokemon;
    private $id_maestro;
    private $type; 
    private $name;   
    private $image;
   

    public function __construct ($datos){
        $this->id_pokemon = $datos['id_pokemon']; 
        $this->id_maestro = UserRepository::getUserById($datos['id_maestro']); 
        $this->type = $datos['type']; 
        $this->name = $datos['name'];
        $this->image = $datos['image'];
        // $this->comments = CommentsRepository::getCommentsByArticle($datos['id_pokemon']); 
          
    }   

    public function getIdPokemon(){
        return $this->id_pokemon;
    }

    public function getMaestro(){
        return $this->id_maestro;
    }


    public function getName(){
        return $this->name;
    }

    public function getType(){
        return $this->type;
    }

    public function getImage(){
        return $this->image;
    }

} 

?>