<?php

class TeamRepository{

    public static function getTeamById($id_team){
        $db = Conectar::conexion();
        $q = "SELECT * from team where id_team = '".$id_team."' ";
        $result = $db->query($q);
        $team = [];
        while($datos = $result->fetch_assoc()) {
            $team[] = new Team($datos);
    
        }   
        return $team;
    }

    public static function createTeam($id_maestro){  
        $db = Conectar::conexion();            
        $result = $db->query("INSERT INTO team(id_team, id_maestro,name) VALUES (NULL, '$id_maestro', '') ");
        $idOrder = $db->insert_id;
        
        $resutl2 = $db->query("SELECT * FROM team WHERE id_team= '".$idOrder."'");
        if($datos = $resutl2->fetch_assoc()) {
            //creo la session order
            $_SESSION['team'] = new Team($datos);
            
        }        
    } 

    public static function updateTeam($id_team, $name){         
        $db = Conectar::conexion();
        echo $name;
        $result = $db->query("UPDATE team SET id_team = '$id_team' , name = '$name' WHERE team.`id_team` = $id_team"); 
                
    } 

    public static function getTheMostUserCreateTeam(){
        $db = Conectar::conexion();
        $q = "SELECT id_maestro,COUNT(id_team) from team GROUP BY id_maestro";
        $result = $db->query($q);
        $maxPokemon = $result->fetch_column();
        $user = UserRepository::getUserById($maxPokemon);
        return $user;
    }

    public static function checkName($id_team){
        $db = Conectar::conexion();
        $q = "SELECT name from team where id_team = '$id_team'";
        $result = $db->query($q);
        $name = $result->fetch_column();
        return $name;
    }
    
    
    
} 


?>