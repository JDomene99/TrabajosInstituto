<?php
//botones por get
//action form por post
//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/productosModel.php');
require_once('models/productosRepository.php');
require_once('models/roleModel.php');
require_once('models/roleRepository.php');
session_start();

$porductCount = ProductosRepository::getCountProduct();
//cargamos los articulos
$productos = [];
if(!isset($_GET['findArticleButton']) ){
    $productos = ProductosRepository::getProductos(1);
   
} 
//si llama a una pagina
if(isset($_GET['pagina'])){ 
    echo $_GET['pagina'];
    if($_GET['pagina']> 1 || $_GET['pagina'] <$porductCount){        
        $productos =ProductosRepository::getProductos($_GET['pagina']);
    }
}

//cargamos la lista de articulos de la busqueda
// if(isset($_GET['textToFind'])){
//     $articleNumero = ArticleRepository::getCountarticleFindArticle($_GET['textToFind']); 
//     $article = ArticleRepository::findArticle($_GET['textToFind'],1);
//     if(isset($_GET['pagina']) && $_GET['pagina']> 1 && $_GET['pagina'] <= $articleNumero){ 
//         $article = ArticleRepository::findArticle($_GET['textToFind'],$_GET['pagina']);
//     }
// }

//carga toda las productos
// $productos = ProductosRepository::getProductos();


//crea un usuario vacio para poder cargar mas despues
if(!isset($_SESSION['user'])){
    $datos['id_user']=0;
    $datos['name']="";
    $datos['id_rol']=1;
    $_SESSION['user'] = new User($datos);
}

//Vista de crear producto
if(isset($_GET['newProducto'])){
    require_once('controllers/productosController.php');
}

//Vista de crear producto
if(isset($_GET['producto'])){
    require_once('controllers/productosController.php');
}

if(isset($_GET['carrito'])){
    require_once('controllers/carritoController.php');
}

if(isset($_GET['role'])){
    require_once('controllers/roleController.php');
}


//ir al form de login
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}  


require_once("views/mainView.phtml");
?>