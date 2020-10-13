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
    
    if($_FILES['imagen']['error']){
        switch($_FILES['imagen']['error']){
            case 1:
            //Error exceso de tamaño;
            echo "Excede el tamaño del archivo";
            break;
            case 2:
            echo "El tamaño del archivo supera los dos megas";
            break;
            case 3:
            echo"Archivo no se termino de subir";
            break;
            case 4:
            echo "No se subio ningun archivo";
            break;
        }
    }else{
        echo "Entrada de datos se completo correctamente";
        /* si existe un nombre y no hay ningun error */
        if((isset($_FILES['imagen']['name'])&&($_FILES['imagen']['error'])==UPLOAD_ERR_OK)){
           $destinoDeRuta="img/";
                              /*movemos el archivo de $_FILES de la capeta temporal a img */
           move_uploaded_file($_FILES["imagen"]['tmp_name'],$destinoDeRuta.$_FILES['imagen']['name']);
           
           echo "El archivo".$_FILES['imagen']['name']."se ha copiado en el directorio de imagenes";
        }else{
           echo "El archivo no sea a podido mover a la carpeta imagen";

        }
    }
    $titulo=$_POST['campoTitulo'];
    $fecha=date("Y-m-d H:i:s");
    $comentario=$_POST['areaComentarios'];
    $imagen=$_FILES['imagen']['name'];

    $miConsulta="INSERT INTO `contenido`( `Titulo`, `Fecha`, `Comentario`, `Imagen`) VALUES ('".$titulo."','".$fecha."','".$comentario."','".$imagen."')";
    
    $resultado=mysqli_query($miconexion,$miConsulta);
    
    /*Cerramos conexion*/
    mysqli_close($miconexion);
    
    echo "<br/> Se ha agregado el comentario con exito. <br/> <br/> ";
    
    echo "<a href='index.php'>Inicio</a></br>";
    echo "<a href='mostrarBlog.php'>Blog</a></br>";

 ?>
</body>
</html>