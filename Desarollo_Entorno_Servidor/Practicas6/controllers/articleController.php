<?php
  
$articleFinal = ArticleRepository::getArticleById($_GET['article']);
$commentArticleId = CommentsRepository::getCommentsByArticle($_GET['article']);
require_once("views/articleView.php");

?>