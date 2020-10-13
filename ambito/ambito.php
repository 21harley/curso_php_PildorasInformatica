<!DOCTYPE html>
<html  >
  <head>
    <meta >
    <title></title>
  </head>
  <body>
<?php
$nombre="john";
//include ("codigo.php");
function dameNombre(){
  global $nombre;
  $nombre="pedro";
}
dameNombre();
echo $nombre."<br>";//ambito <>
?>
  </body>
</html>
