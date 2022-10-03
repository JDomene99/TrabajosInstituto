<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 

    <?php 
        $url = "http://localhost/repos/TrabajosInstituto/Desarollo_Entorno_Servidor/Practica2/index.php";
    ?>   

</head>
<body>

    <nav style="display: flex; ">
        <h1 style="margin-left:40% "> <a href="?galeria">  galeria </a> </h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h1> <a href="?contacto"> contacto </a> </h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h1> <a href="?seccion"> seccion </a> </h1>
    </nav>
    
    <?php 
        session_start();
        
        $_SESSION['session'] = 0;
        if(isset($_GET['seccion'])){
            echo " <h1>hola</h1>" ;
            echo '<img src ="imagenes/descarga.jfif">'; 
        }
           
        if(isset($_GET['galeria'])){
            
            $rows = "";
            $items = array(
                'imagenes/descarga.jfif',
                'imagenes/descarga.jfif',
                'imagenes/descarga.jfif',
                'imagenes/descarga.jfif',
                );
                
            foreach($items as $k) {   
                $rows .="<tr>
                            <td><img src='".$k."'></td>
                        </tr>\n";
            }
            echo $rows;
        }

        if(isset($_GET['contacto'])){
           
           echo '<form action="index.php" method="POST">
                    <input type="text" name="user" placeholder="nombre" required> <br/> <br/>
                    <input type="password" name="contraseña" placeholder="contraseña" required> <br/> <br/>
                    <input type="submit" name="save" value="new contact">  
                    <input type="submit" name="login" value="login"> 
                </form>  ';
                
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
            
        }

        echo $_SESSION['session']++;
        

    ?>

</body>
</html>