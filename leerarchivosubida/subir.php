<?php        
 $nombreA=$_FILES["archivo"]["name"];
 $tipoA=$_FILES["archivo"]["type"];
 $tamañoA=$_FILES["archivo"]["size"];

 if($tamañoA<=1000000){
     $carpetaDestino=$_SERVER['DOCUMENT_ROOT']."/img/";
     move_uploaded_file($_FILES['archivo']['tmp_name'],$carpetaDestino.$nombreA);
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
  
  $archivoObj=fopen($carpetaDestino.$nombreA,"r");//se apunto al archivo 
  
  $contenido=fread($archivoObj,$tamañoA);
  
  $contenido=addslashes($contenido);

  fclose($archivoObj);
   //auto compleato en Id se pone en 0
  $sql="INSERT INTO `archivos`(`Id`, `Nombre`, `Tipo`, `Contenido`) VALUES ( 0 ,'$nombreA','$tipoA','$contenido')";

  $personas=array();
  $base=$conexion->query($sql);
  

  /*
  $personas=array();
  $base=$conexion->query("UPDATE `datosusuarios` SET `imagen`='$nombreA' WHERE `Id`='1'");
  while($fila=$base->fetch(PDO::FETCH_ASSOC)){
      $personas[]= $fila;
  }
  foreach($personas as $usuario){
      echo $usuario["Nombre"]."<br>";
  }
  */
?>
