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
	
	<main>

		<?php
		foreach($articleFinal as $item){
			echo $item->getImage();
			echo '<img src="./views/imagenes/'.$item->getImage().'"/>';

		}
		?>
			
	</main>

<?php
die();
?>
</body>
</html>