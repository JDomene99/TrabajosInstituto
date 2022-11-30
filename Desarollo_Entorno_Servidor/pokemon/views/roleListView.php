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
                    echo $maxPokemonUser->getName();
                    echo $maxTeamUser->getName();
                   
                    foreach($userList as $user){
                        
                        if($user->getRol() == '0'){
                            echo'<li>'.$user->getName()." actualmente es admin".' <a href="index.php?role&id_rol='.$user->getId().'"> Cambiar a Maestro Pokemon</a></li>';
                        }
                        else{
                            echo '<li>'.$user->getName()." actualmente es Maestro Pokemon ".'   <a href="index.php?role&id_rol='.$user->getId().'"> Cambiar a Admin</a></li>';
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