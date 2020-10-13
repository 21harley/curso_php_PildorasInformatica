<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $miconexion=mysqli_connect("localhost","root","","dbblog");
    /* comprabar conexion */
    if(!$miconexion){
        echo "La conexion ha fallado".mysqli_error();
        exit();
    }

    $miconsulta="SELECT * FROM `contenido` ORDER BY `FECHA` DESC";

    if($resultado=mysqli_query($miconexion,$miconsulta)){
        while($registro=mysqli_fetch_assoc($resultado)){
            echo "<h3>".$registro['Titulo']."</h3>";
            echo "<h4>".$registro['Fecha']."</h4>";
            echo "<div style='width:400px'>".$registro['Comentario']."</div></br>";
            if($registro['Imagen']!=""){
                echo "<img width='300px' src='img/".$registro["Imagen"]."' >";
            }
            echo "<hr/>";    
        }
    }
/*
para mejorar le blog colorcar paginacion
*/
?>
</body>
</html>