<?php

class PokemonRepository{

    public static function getPokemonById($id_pokemon){
        $db = Conectar::conexion();
        $q = "SELECT * FROM pokemon where id_pokemon = '".$id_pokemon."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $pokemon[] = new Pokemon($datos);    
        return $pokemon;
    } 

    public static function getPokemonByMaestro($id_maestro){
        $db = Conectar::conexion();
        $q = "SELECT * FROM pokemon where id_maestro = '".$id_maestro."' ";
        $result = $db->query($q);
        while($datos = $result->fetch_assoc()){
            $pokemon[] = new Pokemon($datos);    
        }
        return $pokemon;
    }

    public static function addPokemon($type,$name,$image,$id_maestro){
            $ruta = './views/imagenes/';
            $uploadfile = $ruta . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $uploadfile);
            $fechaActual = date('Y-m-d H:i:s');
            $imageToUpload = $image['name'];

            $db = Conectar::conexion();            
            $result = $db->query("INSERT into pokemon(id_pokemon, id_maestro, name, type, image) VALUES( null, $id_maestro,'$name', '$type', '$imageToUpload' ) "); 
    }

    public static function editArticle($id_pokemon,$type,$name,$image){
        $ruta = './views/imagenes/';
        $uploadfile = $ruta . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $uploadfile);
        $fechaActual = date('Y-m-d H:i:s');
        $imageToUpload = $image['name'];
        
        $db = Conectar::conexion();
        $result = $db->query("UPDATE pokemon SET id_pokemon = ' $id_pokemon' , type = '$type', name = '$name' , date = '$fechaActual' , imagen = '$imageToUpload' WHERE article.`idArticle` = $idArticle"); 
    }

    public static function getCountarticle(){
        
        $db = Conectar::conexion();
        $q =  "SELECT Count(*) FROM pokemon";
        $result = $db->query($q);
        $totalArticle = (int)$result->fetch_column();
        return ceil($totalArticle/3);         
    }

    public static function getArticle($numeroPagina){
        $numeroTotal = PokemonRepository::getCountarticle();
        
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM pokemon LIMIT $pagFinal , 3 ";
            $result = $db->query($q);
            while($datos = $result->fetch_assoc()) {
                $article[] = new Pokemon($datos);
            } 
            return $article;
        }
    }

    public static function getCountarticleFindArticle($name){
        $db = Conectar::conexion();
        $q = "SELECT Count(*) FROM pokemon where name LIKE '"."%".$name."%"."' LIMIT 0,3 ";
        $result = $db->query($q);
        $totalArticleFind = (int)$result->fetch_column();
        return ceil($totalArticleFind/3);
    }
    
    public static function findArticle($name, $numeroPagina){
        $numeroTotal = PokemonRepository::getCountarticleFindArticle($name);
        if($numeroPagina <= $numeroTotal){
            $pagFinal = 3*($numeroPagina-1);
            $db = Conectar::conexion();
            $q = "SELECT * FROM pokemon where name LIKE '"."%".$name."%"."' LIMIT $pagFinal,3 ";
            $result = $db->query($q);
            $article=[];
            while($datos = $result->fetch_assoc()) {
                $article[] = new Pokemon($datos);
            } 
            return $article;  
        }      
    } 

    public static function getTheMostUserCreatePokemon(){
        $db = Conectar::conexion();
        $q = "SELECT id_maestro,COUNT(id_pokemon) from pokemon GROUP BY id_maestro";
        $result = $db->query($q);
        $maxPokemon = $result->fetch_column();
        $user = UserRepository::getUserById($maxPokemon);
        return $user;
    }

} 
?>