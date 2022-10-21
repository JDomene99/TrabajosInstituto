<?php

if( isset($_POST['commentArticle']) ) {
    CommentsRepository::createComment($_SESSION['user']->getId(),$_GET['article'],$_POST['commentArticle']);   
}

?>