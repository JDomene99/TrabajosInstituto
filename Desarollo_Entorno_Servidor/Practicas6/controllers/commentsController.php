<?php

if( isset($_POST['commentArticle']) ) {
    CommentsRepository::createComment($_SESSION['user']->getId(),$_GET['article'],$_POST['commentArticle']);   
}

if(isset($_POST['ocultarComment'])){
    if(isset($_POST['idComment'])){
        CommentsRepository::setInvisbleComment($_POST['idComment']);
    }
}

?>