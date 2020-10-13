<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 $Id='';$contenido='';$tipo='';
 try{ 
    $conexion=new PDO('mysql:host=localhost; dbname=tienda','root','');
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
  }catch(Exception $e){
    die("Error".$e->getMessage());
    echo'Linea del error'.$e->getLine();
  }
  $personas=array();
  $base=$conexion->query("SELECT * FROM `archivos`  WHERE `Id`='4'");
  
  while($fila=$base->fetch(PDO::FETCH_ASSOC)){
      $personas[]= $fila;
  }
  $ruta;
  foreach($personas as $usuario){
    $Id=$usuario["Id"];
    $contenido=$usuario["Contenido"];
    $tipo=$usuario["Tipo"];   
  }
  
  echo "Id:".$Id."<br>";

  echo "Tipo:".$tipo."<br>";
  /*tenemos que usar un contenedor que nos muestre la imagen*/
  /*ademas hay que decodificarlo con la funcion data*/
  echo "<img src='data:".$tipo."; base64,". base64_encode($contenido) ."'>";





  /*
  <div>
   <img src="/img/<?php echo $ruta;?>" alt="ImagenPrimerArc" srcset="" width="25%">
</div>
  */
?>

</body>
</html>