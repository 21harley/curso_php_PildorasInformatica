<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/stilos.css">
  </head>
  <body>
<?php
    if(!isset($_COOKIE["nombreUS"])){
      session_start();
      $_SESSION["Usuario"]=$_COOKIE["nombreUS"];
      header("location:eventosE.php");
    } 
?>
<div class="formularioR" style="width:50%">
  <form class="" action="consulta.php" method="post" >
    <img src="imagenes/eventos.png" width="35%" lang="35%" alt="">
    <table>
      <tr>
       <td>Usuario</td><td><input type="text" name="usuario" id="u"required></td>
     </tr>
       <tr>
        <td>Clave</td><td><input type="password" name="clave" id="c" required></td>
      </tr>
      <tr>
        <td>     </td> <td><input type="submit" name="dale" id="dale" value="Iniciar"></td>
      </tr>
      <tr>
        <td>Recordar:</td><td> <input type="checkbox" name="recordar" id="recordar"> </td>
      </tr>
      <tr>
        <td> </td><td> <a href="close.php">Eliminar Cookie</a> </td>
      </tr>
    </table>
    <h4>Si no tienes cuenta <a href="formularioRegistro.html">resgistrate</a></h4>
  </form>
</div>
<footer>
   <address>Tachira, Venezuela</address>
   <small>&copy; 2020 Eventos E</small>
</footer>
  </body>
</html>
