<?php

class TeamPokemonRepository{

    public static function insertPokemonInTeam_Pokemon($id_team,$id_pokemon){
        $db = Conectar::conexion();
        $result = $db->query("INSERT into team_pokemon(id_team_pokemon,id_team,id_pokemon) VALUES(null,'$id_team', '$id_pokemon' ) ");
           
    }

    public static function checkPokemonTeam_Pokemon($id_team){
        $db = Conectar::conexion();
        $q = "SELECT count(*) from team_pokemon where id_team = '".$id_team."' ";
        $result = $db->query($q);
        if($result->fetch_column() >= 5) {
            return false;
    
        }   
        else{
            return true;
        }
    }
    
} 


?>