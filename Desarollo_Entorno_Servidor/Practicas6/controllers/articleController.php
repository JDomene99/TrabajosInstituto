<?php

    //crear article
    if(isset($_GET['createArticle'])){
        if( isset($_POST['tituloArticle']) && isset($_POST['textArea'])  ) {
            // && isset($_POST['imageArticle'])
            $texto = $_POST['textArea'];
            $titulo= $_POST['tituloArticle'];
            $image = 'profile1.jpg';
            $idUser=$_SESSION['user']->getId();
            $db = Conectar::conexion();
            $fechaActual = date('d-m-Y H:i:s');
            $result = $db->query("INSERT into article(idArticle,date,seccion,tittle,imagen,autor) VALUES( null,'$fechaActual', '$texto' ,'$titulo', '$image','$idUser' ) "); 
            
        }
        require_once("views/createArticle.phtml");
        return; 
    }
    
    //mostrar el articulo seleccionado
    $articleFinal = ArticleRepository::getArticleById($_GET['article']);
    require_once("views/articleView.php");

?>