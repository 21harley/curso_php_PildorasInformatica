<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .resaltar{
      color:#F00;
      font-weight: bold;
    }
    </style>
  </head>
  <body>
    <?php
    $nombre="john";$nombre1="Maria";$nombre2="MARIA";
   echo  "<p class=\"resaltar\">nombre:$nombre</p>";

$resultado=strcmp($nombre1,$nombre2);
if($resultado==0) echo "Son iguales<br>";
else echo "No son iguales <br>";

$resultado=strcasecmp($nombre1,$nombre2);
if($resultado==0) echo "Son iguales<br>";
else echo "No son iguales <br>";
    ?>
  </body>
</html>
