<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/stilos.css">
  </head>
  <body>
<?php
session_start();
if(!isset($_SESSION["Usuario"])){
header("location:index.html");
}
?>
<form class="" action="registroE.php" method="post">
  <img src='imagenes/eventosE.png'   width='20%' lang='20%'>;
  <table>
    <tr>
      <td>Nombre:</td> <td> <input type="text" name="nombre" value=""></td>
    </tr>
    <tr>
      <td>Fecha:</td> <td> <input type="date" name="fecha" value=""> </td>
    </tr>
    <tr>
      <td> </td> <td>Total de puestos: </td>
    </tr>
    <tr>
      <td>Alto:</td> <td><input type="text" name="alto" value=""> </td>
    </tr>
    <tr>
      <td>Medio:</td> <td><input type="text" name="medio" value=""> </td>
    </tr>
    <tr>
      <td>VIP:</td> <td><input type="text" name="vip" value=""> </td>
    </tr>
    <tr>
      <td>Platino:</td> <td><input type="text" name="platino" value=""> </td>
    </tr>
    <tr>
      <td> <input type="submit" name="enviar" value="enviar"> </td> <td> <input type="reset" name="borrar" value="borrar"> </td>
    </tr>
  </table>
</form>
   <h3> <a href="eventosE.php">menu</a> </h3>
   <footer>
      <address>Tachira, Venezuela</address>
      <small>&copy; 2020 Eventos E</small>
   </footer>
  </body>
</html>
