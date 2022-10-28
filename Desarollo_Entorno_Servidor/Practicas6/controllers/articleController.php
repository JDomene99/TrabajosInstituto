<?php

    
    if(isset($_GET['createArticle'])){
        //crear article
        if( isset($_POST['tituloArticle']) && isset($_POST['textArea']) && $_FILES["fileToUpload"]) {
            ArticleRepository::createArticle($_POST['textArea'],$_POST['tituloArticle'],$_FILES["fileToUpload"],$_SESSION['user']->getId());
        }
         
        require_once("views/createArticle.phtml");
        return;
    }
    
    //edtiar articulos
    if(isset($_POST['sendDataArticle']) && isset($_POST['editTittle']) && isset($_POST['editTextArea']) && isset($_FILES["editImage"])  ){          
        ArticleRepository::editArticle( $_GET['article'],$_POST['editTextArea'],$_POST['editTittle'],$_FILES["editImage"]); 
    }
    
    //mostrar el articulo seleccionado
    $articleFinal = ArticleRepository::getArticleById($_GET['article']);
    $valoracion = ValoracionRepository::getValoracion($_GET['article']);
    require_once("views/articleView.php");
?>