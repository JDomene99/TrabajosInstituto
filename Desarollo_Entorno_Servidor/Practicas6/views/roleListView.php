<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/editRole.css" >
    <title>Login en web de pelis</title>
</head>
<body>

<header> 
    <h2>Lista de roles</h2>
</header>

<nav>
	<a href="index.php">Inicio</a>
</nav>

<main>
    <section>
        <ul>
            <?php
                foreach($userList as $user){
                    
                    if($user->getRol() == 'admin'){
                        echo'<li>'.$user->getName()." actualmente es ".$user->getRol()."".' <a href="index.php?role&normal&editIdRol='.$user->getId().'">Cambiar a normal</a></li>';
                    }
                    else{
                        echo '<li>'.$user->getName()." actualmente es ".$user->getRol()."".'   <a href="index.php?role&editIdRol='.$user->getId().'">Cambiar a Admin</a></li>';
                    }
                } 
            ?>
        </ul>
       
    </section>

</main>
<?php
die();
?>
</body>

</html>