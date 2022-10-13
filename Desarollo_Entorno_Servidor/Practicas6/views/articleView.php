<!DOCTYPE html>
<html>
<head>
	<title>Blogs de perros</title>
	<style>
		section{
			display: flex;
			flex-wrap: wrap;
		}
		article{
			margin: 1% 3% ;
			width: 25%;
			border: 1px solid black;
			padding: 10px; 
		}
		article h1{
			color: red;
		}
		article div{
			border: 1px solid black;
		}
		h1{
			text-align : center;
		}
	</style>
</head>
<body>
<h1>Blogs de perros</h1>

<a href="index.php">Inicio</a> -

<h1>Articulos</h1>

<!-- muestra los articulo -->
<?php
// if(isset($_GET['article'])){

echo "<section>";
foreach($article as $item){
    echo "<article>";
        echo "<h1>".$item->getTittle()."</h1>";
        echo "<p>".$item->getDate()."</p>";
        echo "<div>";
            echo"<ul>";
                // muestra los comentarios de cada articulo
                foreach($comments as $item){
                    echo "<li>".$item->getComment()."</li>";
                }
            echo"</ul>";
            //nuestro el formulario para comentar cuando se inicia sesion
            if($_SESSION['user']->getName()!=""){
                ?>
                
                <form name="formulario" method="post" action="index.php?">
                    New comment: <input type="text" name="comment" >
                    <input type="submit" name="sendComment" />
                </form>
                
                <?php
            }
        echo"<div>";
    echo "</article>";
}
echo "</section>";

    
// }   
// if(count($article)>0){
// 	echo "<section>";
// 	foreach($article as $item){
// 		echo "<article>";
// 			echo "<h1>".$item->getTittle()."</h1>";
// 			echo "<p>".$item->getDate()."</p>";
// 			echo "<div>";
// 				echo"<ul>";
// 					// muestra los comentarios de cada articulo
// 					foreach($comments as $item){
// 						echo "<li>".$item->getComment()."</li>";
// 					}
// 				echo"</ul>";
// 				//nuestro el formulario para comentar cuando se inicia sesion
// 				if($_SESSION['user']->getName()!=""){
// 					?>
					
// 					<form name="formulario" method="post" action="index.php?">
// 						New comment: <input type="text" name="comment" >
// 						<input type="submit" name="sendComment" />
// 					</form>
					
// 					<?php
// 				}
// 			echo"<div>";
// 		echo "</article>";
// 	}
// 	echo "</section>";
// }
// else{
// 	echo "Sin resultados";
// }
// ?>
</body>
</html>