<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
</head>
<body>

    <form action="index.php" method="POST">
        <input type="text" name="user" placeholder="nombre" required> <br/> <br/>
        <input type="password" name="contraseña" placeholder="contraseña" required> <br/> <br/>
        <input type="submit" name="save" value="new contact">  
        <input type="submit" name="login" value="login"> 
    </form>  

    <?php
        require_once("db.php");
        
        //metodo estatico utiliza dos puntos
        $bd = Conectar::conexion();
        if(!$bd){
            echo "<h1>Error</h1>";
        }
        //sacar datos desde la base de datos
        if(isset($_POST['user']) && isset($_POST['login']) && isset($_POST['contraseña'])) {
            $userDB = $_POST['user']; 
            $contraseña = ($_POST['contraseña']);
            $result = $bd->query("SELECT * FROM users WHERE nombre = '".$userDB."' ");
            $datos = $result->fetch_assoc();
            if($contraseña == $datos['password']) {
                echo "Hola ". $datos['nombre'];
            }
            else{
                echo "No users found.";
            }
        }
        
        if(isset($_POST['user']) && isset($_POST['save']) && isset($_POST['contraseña'])){
            $userDB = $_POST['user'];
            $contraseña = ($_POST['contraseña']);
            $result = $bd->query("SELECT * FROM users WHERE nombre = '".$userDB."' ");
            $datos = $result->fetch_assoc();
            if(!$datos) {
                $result = $bd->query("INSERT into users(id,nombre,password) VALUES(null,'$userDB','$contraseña')");
                echo "Hola ". $userDB;
            }
            else{
                echo "this user exist.";
            }
            
            
        }
           
        
    ?>
 

</body>
</html>