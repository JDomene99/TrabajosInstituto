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
        <!-- <input type="submit" name="save" value="new contact">  
        <input type="submit" name="login" value="login">  -->
    </form>  

    <?php
        session_start();

        if(isset($_SESSION['logout'])){
            unset($_SESSION['sesionIniciada']);

        }
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
                $_SESSION['sesionIniciada'] = $datos['nombre'];
                echo $_SESSION['sesionIniciada'] ;
            }
            else{
                echo "Wrong password.";
            }
        }
        
        //nuevo usuario
        if(isset($_POST['user']) && isset($_POST['save']) && isset($_POST['contraseña'])){
            $userDB = $_POST['user'];
            $contraseña = ($_POST['contraseña']);
            $result = $bd->query("SELECT * FROM users WHERE nombre = '".$userDB."' ");
            $datos = $result->fetch_assoc();
            if(!$datos) {
                $result = $bd->query("INSERT into users(id,nombre,password) VALUES(null,'$userDB','$contraseña')");
                echo $userDB." registrado";
            }
            else{
                echo "this user exist.";
            }
        }
        if(!isset($_SESSION['sesionIniciada'])){
            echo '<input type="submit" name="save" value="new contact">  
                <input type="submit" name="login" value="login"> ';
            
        }
        else{
            echo '<a href="index.php?logout"> salir </a>';
        }

        
    ?>
 

</body>
</html>