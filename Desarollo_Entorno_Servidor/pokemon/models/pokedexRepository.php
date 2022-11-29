<?php

class PokedexRepository{

    public static function getCommentsByArticle($id_article){
        $db = Conectar::conexion();
        $q = "SELECT * from pokedex where id_article = '".$id_article."' ";
        $result = $db->query($q);
        $pokedex = [];
        while($datos = $result->fetch_assoc()) {
            $pokedex[] = new Pokedex($datos);
    
        }   
        return $pokedex;
    }

    public static function insertPokemonInPokedex($id_pokemon,$id_maestro){
        $db = Conectar::conexion();
        if(PokedexRepository::checkPokemon($id_pokemon,$id_maestro)){
            $result = $db->query("INSERT into pokedex(id_pokedex,id_pokemon,id_maestro) VALUES(null,'$id_pokemon', '$id_maestro' ) ");
        }
        else{
            echo 'ya esta creado';
        }
         
    }

    public static function checkPokemon($id_pokemon, $id_maestro){
        $db = Conectar::conexion();
        $q = "SELECT * from pokedex where id_pokemon = '".$id_pokemon."' AND id_maestro = '".$id_maestro."' ";
        $result = $db->query($q);
        if($result->fetch_assoc()) {
            return false;
    
        }   
        else{
            return true;
        }
    }
    
} 


?>