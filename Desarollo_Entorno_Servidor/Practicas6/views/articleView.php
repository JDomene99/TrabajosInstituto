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
	
	if($_SESSION['user']->getRol() =="admin"){
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
		echo "<h2>(".$item->getAutor()->getName().")</h2><br>";
		echo '<img src="./views/imagenes/'.$item->getImage().'"/> <br>'; 
		echo 'La valoracion del articulo es <b>'.$valoracion. '</b> <br>';
		
		if($_SESSION['user']->getName()!=""){
			for ($i = 1; $i <= 5; $i++) {
				echo '<a href="index.php?article='.$item->getIdArticle().'&valoracion='.$i.'">'.$i.'</a>';				
			}
		}

		echo "<p>".$item->getSeccion()."</p>";	
        echo "<div>";
            echo"<ul>";
                // muestra los comentarios de cada articulo
				if($item->getComments()){
					foreach($item->getComments() as $itemComment) {
						
						echo "<li>".'<img src="./views/imagenes/'.$item->getAutor()->getImage().'"/>'.$itemComment->getUser()->getName().": ".$itemComment->getComment()."(".$itemComment->getTime().")</li>";
				
						if($_SESSION['user']->getRol() =="admin"){
							echo ' <form name="formulario" method="post" action="index.php?comment&article='.$item->getIdArticle(). ''. '">
								<input type="submit" name="ocultarComment" value="Ocultar"/> 
								<input type="hidden"  name="idComment" value="'.$itemComment->getIdComment().'"/>
							</form>';
						}
						
						
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