<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once("../modelo/objetoBlog.php");
include_once("../modelo/menojoObj.php");
try{
 $miconexion=new PDO('mysql:host=localhost; dbname=dbblog','root','');
 $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

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
       $destinoDeRuta="../img/";
                          /*movemos el archivo de $_FILES de la capeta temporal a img */
       move_uploaded_file($_FILES["imagen"]['tmp_name'],$destinoDeRuta.$_FILES['imagen']['name']);
       
       echo "El archivo".$_FILES['imagen']['name']."se ha copiado en el directorio de imagenes";
    }else{
       echo "El archivo no sea a podido mover a la carpeta imagen";

    }
}

$manejoObjeto=new ManejoObj($miconexion);
$manejoObjeto->setConexion($miconexion);
$blog=new ObjetoBlog();

$blog->setTitulo($_POST['campoTitulo']);
$blog->setFecha(date("Y-m-d H:i:s"));
$blog->setComentario($_POST['areaComentarios']);
$blog->setImagen($_FILES['imagen']['name']);

$manejoObjeto->insertarContenido($blog);

echo "<br/> Se ha agregado el comentario con exito. <br/> <br/> ";
echo "<a href='../index.php'>Inicio</a></br>";
echo "<a href='../vista/mostrarBlog.php'>Blog</a></br>";

}catch(Exception $e){
  echo"Error".$e->getMessage();
}


?>
</body>
</html>