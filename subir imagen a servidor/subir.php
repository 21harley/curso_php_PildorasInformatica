<?php
//cuando se quiere rescartar la img de un archivo $_FILES
               // imagen ->propiedad        
 $nomreI=$_FILES["imagen"]["name"];
 $tipoI=$_FILES["imagen"]["type"];
 $tamañoI=$_FILES["imagen"]["size"];

 if($tamañoI<=1000000){//limite en byte de imagen
    if($tipoI=="image/jpeg"||$tipoI=="image/jpg"||$tipoI=="image/png"||$tipoI=="image/gif"){
     //ruta de carpeta destino de la imagen en el servidor
     $carpetaDestino=$_SERVER['DOCUMENT_ROOT']."/img/";
 
     //mover la imagen del directorio temporal al directorio escogido
     move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetaDestino.$nomreI);
    }else{
        echo "el dato no es una imagen";
    }

 }else{
    echo "El tamanio es demaciado grande";
 }
 try{ 
    $conexion=new PDO('mysql:host=localhost; dbname=tienda','root','');
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
  }catch(Exception $e){
    die("Error".$e->getMessage());
    echo'Linea del error'.$e->getLine();
  }
  $personas=array();
  $base=$conexion->query("UPDATE `datosusuarios` SET `imagen`='$nomreI' WHERE `Id`='1'");
  /*
  while($fila=$base->fetch(PDO::FETCH_ASSOC)){
      $personas[]= $fila;
  }
  foreach($personas as $usuario){
      echo $usuario["Nombre"]."<br>";
  }
  */
?>
