<?php

class UserRepository{
    
    public static function getUserById($id){  
        
        $db = Conectar::conexion();
        $q = "SELECT * FROM users where id_user = '".$id."' ";
        $result = $db->query($q);
        $datos = $result->fetch_assoc();
        $user = new User($datos);
        return $user;  
        
    }  
    
    public static function loginUser($user, $password){
        $db = Conectar::conexion();
        $q = "SELECT * FROM users WHERE name= '".$user."'";
        $result = $db->query($q);
        if($datos = $result->fetch_assoc()) {
            if($datos['password'] == $password) {
                $_SESSION['user'] = new User($datos);
                session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
                $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
                UserRepository::updateToOnline($datos['id_user']);
            }
        }
    }

    public static function registerUser($nombre,$passwordUser){
        $db = Conectar::conexion();
        $result = $db->query("SELECT * FROM users WHERE name = '".$nombre."' ");
        if(!$datos = $result->fetch_assoc()) {
            $result = $db->query("INSERT into users(id_user,name,password) VALUES( null, '$nombre' , '$passwordUser') ");      
        }
    }

    public static function updateToOnline($id_user){
        $db = Conectar::conexion();
        $result = $db->query("UPDATE users SET online = '1' WHERE users.id_user =  $id_user");
        
    }

    public static function updateToDesconect($id_user){
        unset($_SESSION["ultimoAcceso"]);
        unset($_SESSION['user']);
        $db = Conectar::conexion();
        $result = $db->query("UPDATE users SET online = '0' WHERE users.id_user =  $id_user");
        header('Location: index.php');
    }


    public static function getUserConected(){
        $db = Conectar::conexion();
        $result = $db->query("SELECT COUNT(*) FROM users WHERE online = '1' ");
        $userConnected = (int)$result->fetch_column();
        return $userConnected;
        
    }

    public static function getUserInfoConected(){
        UserRepository::checkTimeUser();
        $db = Conectar::conexion();
        $users = [];
        $result = $db->query("SELECT * FROM users WHERE online = '1' ");
        while($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }
        return  $users;
        
    }

    public static function checkTimeUser(){ 
        $db = Conectar::conexion();
        if(isset($_SESSION["ultimoAcceso"])){
            $tiempoInicio = $_SESSION["ultimoAcceso"];
            $ahora = date('Y-m-d H:i:s');       
            $tiempo_transcurrido = (strtotime($ahora)-strtotime($tiempoInicio));  
            if($tiempo_transcurrido >= 1000) {
                echo $tiempo_transcurrido;
                UserRepository::updateToDesconect($_SESSION["user"]->getId());
            }
            
        }
        
        
            
    }

    
} 

?>