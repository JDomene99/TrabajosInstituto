<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 

    <?php 
        $url = "http://localhost/repos/TrabajosInstituto/Desarollo_Entorno_Servidor/Practica2/dia2.php";
    ?>   

</head>
<body>

    




    <nav style="display: flex; ">
        <h1 style="margin-left:40% "> <a href="?seccion=galeria">  seccion </a> </h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h1> <a href="?seccion=contacto"> contacto </a> </h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h1> <a href="dia2.php"> sin nada </a> </h1>
    </nav>
    <?php 

        if(!isset($_GET['seccion'])){
            echo " <h1>hola</h1> <p>parrafo</p>" ;
            echo '<img src ="imagenes/descarga.jfif">'; 
        }
           
        if(isset($_GET['seccion']) && $_GET['seccion'] == 'galeria'){
            

            $rows = "";
            $items = array(
                'imagenes/descarga.jfif',
                'imagenes/descarga.jfif',
                'imagenes/descarga.jfif',
                'imagenes/descarga.jfif',
                );
                
            foreach($items as $k) {   
                $rows .="<tr>
                            <td><img src='".$k."'></td>
                        </tr>\n";
            }
            echo $rows;
        }

        if(isset($_GET['seccion']) && $_GET['seccion'] == 'contacto'){
           
           echo '<form>
                        <input type="text" name="name" placeholder="Nombre">
                        <input type="text" name="apellido" placeholder="Apellido">
                        <input type="submit" name="login">
                </form>';
            
        }


    ?>

</body>
</html>