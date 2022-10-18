<?php

    $articleFinal = ArticleRepository::getArticleById($_GET['article']);
    require_once("views/articleView.php");

?>