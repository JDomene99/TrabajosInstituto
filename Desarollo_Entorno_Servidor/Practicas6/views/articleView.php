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


<!-- muestra el articulo seleccionado -->

<?php

foreach($articleFinal as $item){
echo "<nav>";
	echo'<a href="index.php">Inicio</a>';
	
	if($_SESSION['user']->getName()!=""){
		if(isset($_GET['editArticle'])) {
			echo'<a href="index.php?article='.$item->getIdArticle().'">Editar Articulo</a>';
		}
		else{
			echo'<a href="index.php?article='.$item->getIdArticle().'&editArticle">Editar Articulo</a>';
		}
	}


	
	
echo "</nav>";

echo "<main>";
echo "<section>";

    echo "<article>";
        echo "<h1>".$item->getTittle()."</h1>";
        echo "<h2>(".$item->getDate().")</h2>";
		echo "<h2>(".$item->getAutor()->getName().")</h2>";
		echo "<p>".$item->getSeccion()."</p>";
        echo "<div>";
            echo"<ul>";
                // muestra los comentarios de cada articulo
				if($item->getComments()){
					foreach($item->getComments() as $itemComment) {
						echo "<li>".'<img src="./views/imagenes/'.$item->getAutor()->getImage().'"/>'.$item->getAutor()->getName().": ".$itemComment->getComment()."(".$itemComment->getTime().")</li>";
					}
				}
                else{
					echo "<li> <b> No hay comentarios actualmente </b></li>";
				}
            echo"</ul>";

            //nuestro el formulario para comentar cuando se inicia sesion
            if($_SESSION['user']->getName()!=""){
				echo '<form name="formulario" method="post" action="index.php?comment&article='.$item->getIdArticle().'">
					<input type="text" name="commentArticle" >
					<input type="submit" name="sendcomment" value="send"/>
					</form>';
            }
			else{
				echo 'Inicia sesion para poder comentar';
			}
			
        echo"<div>";
    echo "</article>";

echo "</section>";
}

if(isset($_GET['editArticle'])) {
	echo "<section>";
		foreach($articleFinal as $article){
			echo '<form name="formulario" method="post" enctype="multipart/form-data" action="index.php?article='.$item->getIdArticle().'">
							<input type="text" name="editTittle" placeholder="'.$item->getTittle().'" >
							<textarea name="editTextArea" rows="10" cols="50" placeholder="'.$item->getSeccion().'"></textarea>
							<input type="file" name="editImage" required />
							<input type="submit" name="sendDataArticle" value="send"/>
					</form>';
		}
	echo "</section>";
}




die();
?>
</main>
</body>
</html>