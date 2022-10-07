<?php
session_start();

require_once("db.php");
$db = Conectar::conexion();

if(isset($_GET['logout'])){
    session_destroy();
    //unset($_SESSION['loged']);
    header('location: index.php');
}

if(!isset($_SESSION['loged']))
    $_SESSION['loged']=0;

if(isset($_POST['login'])){
    if(isset($_POST['username']) && isset($_POST['pass'])) {
        $q="SELECT * FROM users WHERE name = '".$_POST['username']."'";
        $result=$db->query($q);
        if($datos=$result->fetch_assoc()){
            if(md5($_POST['pass'])==$datos['password']){
                $_SESSION['loged']=$datos['name'];
                $_SESSION['userEmail']=$datos['email'];
                $_SESSION['image']=$datos['image'];
            }
            else $error ="ERROR: contraseña inválida.";
        }
        else $error ="ERROR: nombre inválido.";
        
    }
}



//comienzan los echos

echo '<h1>titulo</h1>';
echo '<nav><a href="index.php">Inicio</a>
<a href="index.php?seccion=galeria">galeria</a>
<a href="index.php?seccion=contacto">contacto</a>';

if($_SESSION['loged'])
    echo '<a href="index.php?logout">Salir</a>';

echo '</nav>';

if($_SESSION['loged'])
echo "Hola 
    <img src='imagenes/".$_SESSION['image']."' width='20px'/>
    <a href='".$_SESSION['userEmail']."'>".$_SESSION['loged']."</a>";

if(isset($error)) echo $error;

if(isset($_GET['seccion'])){
    if($_GET['seccion']=="galeria")
        echo "galeria";

    else if($_GET['seccion']=="contacto"){
    echo "contacto";
    }
}
else {

   
?>

<form method="POST" action="index.php">
    nombre: <input type="text" name="username" required>
    contraseña: <input type="password" name="pass" required>
    <input type="submit" name="login">
</form>

<?php
}
?>