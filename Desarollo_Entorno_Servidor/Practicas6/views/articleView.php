<!DOCTYPE html>
<html>
<head>
	<title>Blogs de perros</title>
	<link rel="stylesheet" href="./css/articleView.css" >
</head>
<body>




<header>
	<h1>Blogs de perros</h1>
</header>

<nav>
<a href="index.php">Inicio</a>
</nav>
<!-- muestra el articulo seleccionado -->
<main>
<?php
foreach($articleFinal as $item){
echo "<section>";

    echo "<article>";
        echo "<h1>".$item->getTittle()."</h1>";
        echo "<h2>(".$item->getDate().")</h2>";
		echo "<p>".$item->getSeccion()."</p>";
        echo "<div>";
            echo"<ul>";
                // muestra los comentarios de cada articulo
				if($item->getComments()){
					foreach($item->getComments() as $itemComment) {
						echo "<li>".'<img src="./views/imagenes/'.$itemComment->getUser()->getImage().'"/>'.$itemComment->getUser()->getName().": ".$itemComment->getComment()."(".$itemComment->getTime().")</li>";
					}
				}
                else{
					echo "<li> No hay comentarios actualmente</li>";
				}
            echo"</ul>";

            //nuestro el formulario para comentar cuando se inicia sesion
            if($_SESSION['user']->getName()!=""){
				echo '<form name="formulario" method="post" action="index.php?comment&article='.$item->getIdArticle().'">
					<input type="text" name="commentArticle" >
					<input type="submit" name="sendcomment" value="send"/>
				</form>';
            }
			
        echo"<div>";
    echo "</article>";

echo "</section>";
}

die();
?>
</main>
</body>
</html>