<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/stilos.css">
  </head>
  <body>
    <?php
      include("funciones.php");
       session_start();
    if(!isset($_SESSION["Usuario"])){
      header("location:index.html");
    }else{
      $nombre=$_SESSION["Usuario"];
      echo "<div class='formularioR' style='width:50%' >";
      echo "<img src='imagenes/eventosE.png'   width='30%' lang='30%'>";
      $dato=consultaU($nombre);
      $dato=$dato->fetch(PDO::FETCH_ASSOC);
      if($dato['Acceso']=='a'){
        echo "<br><h2>Administrador ".$_SESSION["Usuario"]."</h2>";
        echo "<h3>Crear  evento:<a href='formularioEvento.php'>click</a></h3>";
        echo "<h3>Listado de registro de asistencia:<a href='ListadoRA.php'>click</a></h3>";
        echo "</div >";
      }else{
        echo "<br><h2>Usuario ".$_SESSION["Usuario"]."</h2>";
        echo "<h3>Registrar boleto:<a href='formularioBoleto.php'>click</a></h3>";
        echo "</div >";
      }
        echo "<br><h2><a href='cierre.php'>Cerrar</a></h2>";
    }
    ?>
    <footer>
       <address>Tachira, Venezuela</address>
       <small>&copy; 2020 Eventos E</small>
    </footer>
  </body>
</html>
