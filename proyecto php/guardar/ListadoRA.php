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
    }
    ?>
<div class="formularioR" style="width:70%">
  <img src="imagenes/eventosE.png" width='25%' lang='25%' alt="">
      <?php
        $res=consultaT("evento");
        foreach ($res as $key ){
          //print_r($key);
          echo "<h2>".$key['Nombre']."</h2> <h3>Puestos Disponibles Alto:".$key['Alto']." Medio:".$key['Medio']." VIP:".$key['VIP']." Platino:".$key['Platino']."</h3>";
          echo"<table>
            <tr>
              <td>Nombres</td><td>Apellidos</td><td>Cedula</td><td>Nombre evento</td><td>Ubicacion</td><td>Detalles</td><td>Editar</td><td>Eliminar</td>
            </tr>";

          $bolet=consultaTa('Nombre_evento',$key['Nombre'],'boleto');
          $total=0;
          foreach ($bolet as $k) {
            $total++;
          }
          if($total>0){
            foreach ($bolet as $r) {
              $dato=consultaU($r['Usuario']);
              $dato=$dato->fetch(PDO::FETCH_ASSOC);
              echo "
                    <tr>
                    <td>".$dato['Nombres']."</td><td>".$dato['Apellidos']."</td><td>".$dato['Cedula']."</td><td>".$r['Nombre_evento']."</td><td>".$r['Ubicacion']."</td>
                    <td><form action='funcionRA.php' method='post'><input type='hidden'name='serial' value=".$r['Serial']." ><input type='hidden'name='tipo' value='Detalles' ><input type='submit' name='enviar' value='Dale'></form></td>
                    <td><form action='funcionRA.php' method='post'><input type='hidden'name='serial' value=".$r['Serial']." ><input type='hidden'name='tipo' value='Editar' ><input type='submit' name='enviar' value='Dale'></form></td>
                    <td><form action='funcionRA.php' method='post'><input type='hidden'name='ubicacion' value=".$r['Ubicacion']." ><input type='hidden'name='serial' value=".$r['Serial']." ><input type='hidden'name='tipo' value='Eliminar' ><input type='submit' name='enviar' value='Dale'></form></td>
                    <tr>";
            }
            echo"</table><br>";

          }else{
             echo "</table><br><h3 class='se'>No hay asistentes </h3>";
          }
        }
        echo "<h2><a href='eventosE.php'>menu</a></h2>";
        ?>
</div>
  </body>
</html>
