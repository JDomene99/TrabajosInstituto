<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
</head>
<body>
    <h1>Pagina de prueba</h1>
    <!-- isset($_GET['image']) si existe esa variable -->
    <?php 
    if(isset($_GET['image']) && $_GET['image'] == 1){
        echo '<img src ="imagenes/descarga.jfif">';
        
    }

    if(isset($_GET['image']) && $_GET['image'] == 2){
        echo "<p> adios </p>";
    }
        
    ?>

</body>
</html>