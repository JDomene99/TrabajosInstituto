<?php

if( isset($_GET['article'])){
    echo "jola";
    require_once('models/articleModel.php');
    require_once('models/articleRepository.php');
    $article[] = Article::getArticleById();
    require_once('models/articleRepository.php')

}
require_once("views/mainView.phtml")

?>