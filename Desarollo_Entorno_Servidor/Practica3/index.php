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
        <input type="text" name="user">
        <input type="password" name="contraseña">
        <input type="submit" name="login">
    </form>

    

    <?php

        require_once("db.php");

        $bd = Conectar::conexion();
        if(!$bd){
            echo "<h1>Error</h1>";
        }

        
        $userDB = '';
        if(isset($_POST['user']) && $_POST['user'] == $userDB) {
              
            $result = $bd->query("SELECT * FROM users WHERE users = '$userDB' ");
            $datos = $result->fetch_assoc();
            echo  $datos['nombre'];
            echo  $userDB;
        }
        // $result = $bd->query("SELECT * FROM users WHERE users = '$userDB' ");

        // while($datos = $result->fetch_assoc()){
        //     // echo  $datos['nombre']." su contraseña es : ".$datos['contraseña']."<br/>";
        //     // if(isset($_POST['user']) && $_POST['user'] == $datos['nombre'] && isset($_POST['pass']) && $_POST['pass'] == $datos['contraseña']) {
        //     //     echo "ok";
        //     // }
        //     echo "ok";
            
        // }


        
    ?>
 

</body>
</html>