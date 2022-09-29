<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
</head>
<body>

    <h1>Buscar usuario</h1>
    <form action="index.php" method="POST">
        <input type="text" name="user" placeholder="nombre" required>
        <input type="password" name="contraseña" placeholder="contraseña" required>
        <input type="submit" name="login">
    </form>    
    <br/>
    <br/>
    <br/>
    <h1>Crear un usuario</h1>
    <form action="index.php" method="POST">
        <input type="text" name="addUser" placeholder="nombre" required>
        <input type="text" name="apellido" placeholder="apellido" required>
        <input type="password" name="contraseña" placeholder="contraseña" required>
        <input type="number" name="edad" placeholder="edad" required>
        <input type="submit" name="save">
    </form>  

    <?php

        require_once("db.php");

        $bd = Conectar::conexion();
        if(!$bd){
            echo "<h1>Error</h1>";
        }
        //sacar datos desde la base de datos
        $userDB = '';
        if(isset($_POST['user']) && isset($_POST['login']) ) {
            $userDB = $_POST['user']; 
            $result = $bd->query("SELECT * FROM users WHERE nombre = '".$userDB."' ");
            $datos = $result->fetch_assoc();
            if($datos == null){
                echo "No users found.";
            }
            else
            echo  $datos['nombre'];

        }
        
        if(isset($_POST['addUser']) && isset($_POST['save']) && isset($_POST['apellido']) && isset($_POST['contraseña']) && isset($_POST['edad'])){
            $userDB = $_POST['addUser'];
            $apellido = $_POST['apellido'];
            $contraseña = ($_POST['contraseña']);
            $edad = $_POST['edad'];
            echo md5($contraseña);
            
                // $result = $bd->query("INSERT into users(nombre,apellido,contraseña,edad) VALUES('$userDB','$apellido','$contraseña','$edad')");
            
            
            
        }
           
        
    ?>
 

</body>
</html>