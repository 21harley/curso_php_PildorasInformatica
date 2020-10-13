<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilos.css">
    <title></title>
  </head>
  <body>
<?php
include("funciones.php");
session_start();
if(!isset($_SESSION["Usuario"])){
header("location:index.html");
}
?>
<img src="imagenes/eventosE.png" width="15%" lang="15%" alt="">
<?php
$total=0;
$res=consultaT("evento");
foreach ($res as $key ) {
  $total++;
}
if($total>0){
  echo "<h3> Eventos disponibles</h3>
  <table>
       <tr>
       <td>Evento</td><td></td><td>Fecha</td>
       </tr>
  ";
  foreach ($res as $key) {
      echo "
      <tr>
      <td>".$key['Nombre']."</td><td></td><td>".$key['Fecha']."</td>
      </tr>
      ";
  }
  echo "</table>";
}else{
  echo "<h2>Eventos proximamente</h2>";
}
?>
    <form class="" action="registroB.php" method="post">
      <h3>Registro Boleto</h3>
      <table>
        <tr>
          <td>Serial:</td><td> <input type="text" name="serial" value="" id="serial" required> </td>
        </tr>
        <tr>
          <td>Nombre evento:</td><td> <input type="text" name="evento" value="" id="evento" required> </td>
        </tr>
        <tr>
          <td>Fecha del evento:</td> <td> <input type="date" name="fecha" value="" id="fecha"> </td>
        </tr>
        <tr>
          <td>Ubicacion:</td>
           <td> <input type="radio" name="ubiacion" value="Alto" id="ubiacion">Alto</td>
           <td> <input type="radio" name="ubiacion" value="Medio" id="ubiacion">Medio</td>
           <td> <input type="radio" name="ubiacion" value="VIP" id="ubiacion">VIP</td>
           <td> <input type="radio" name="ubiacion" value="Platino" id="ubiacion">Platino</td>
        </tr>
        <tr>
          <td> </td>
          <td> <input type="submit" name="enviar" value="enviar"> </td>
          <td> <input type="reset" name="borrar" value="borrar"> </td>
        </tr>
      </table>
      <p> </p>
    </form>
    <h4><a href="eventosE.php" >menu</a></h4>
    <footer>
       <address>Tachira, Venezuela</address>
       <small>&copy; 2020 Eventos E</small>
    </footer>
  </body>
</html>
