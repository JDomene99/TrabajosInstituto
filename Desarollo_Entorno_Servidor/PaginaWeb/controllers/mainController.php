<?php
//botones por get
//action form por post
//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/productosModel.php');
require_once('models/productosRepository.php');
session_start();

//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id_user']=0;
    $datos['name']="";
    $datos['id_rol']=1;
    $_SESSION['user'] = new User($datos);
}

//carga toda las productos
$productos = ProductosRepository::getProductos();

//Vista de crear producto
if(isset($_GET['newProducto'])){
    require_once('controllers/productosController.php');
}

//Vista de crear producto
if(isset($_GET['producto'])){
    require_once('controllers/productosController.php');
}



//ir al form de login
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  


require_once("views/mainView.phtml");
?>