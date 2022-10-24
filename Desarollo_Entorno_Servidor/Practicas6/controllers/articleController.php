<?php

    //crear article
    if(isset($_GET['createArticle'])){
        if( isset($_POST['tituloArticle']) && isset($_POST['textArea']) && $_FILES["fileToUpload"]["name"]) {
            
            $ruta = './views/imagenes/';
            $uploadfile = $ruta . basename($_FILES['fileToUpload']['name']);
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {} 
            $idUser = $_SESSION['user']->getId();
            $titulo = $_POST['tituloArticle'];
            $imagen = $_FILES["fileToUpload"]["name"];
            $texto = $_POST['textArea'];
            $db = Conectar::conexion();            
            $fechaActual = date('d-m-Y H:i:s');
            $result = $db->query("INSERT into article(idArticle,date,seccion,tittle,imagen,autor) VALUES( null,'$fechaActual', '$texto' ,'$titulo', '$imagen','$idUser' ) "); 
            
            // ArticleRepository::createArticle($_POST['textArea'],$_POST['tituloArticle'],$_FILES["fileToUpload"]["name"],$_SESSION['user']->getId());
        
        }
        require_once("views/createArticle.phtml");
        return; 
    }
    
    //edtiar articulos
    if(isset($_POST['sendDataArticle']) && isset($_POST['editTittle']) && isset($_POST['editTextArea'])  ){
                  
        ArticleRepository::editArticle( $_GET['article'],$_POST['editTextArea'],$_POST['editTittle']); 
    
    }

    

    //mostrar el articulo seleccionado
    $articleFinal = ArticleRepository::getArticleById($_GET['article']);
    require_once("views/articleView.php");
?>