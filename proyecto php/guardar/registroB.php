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
  try{
    $serial=$_POST['serial'];
    $nombreE=$_POST['evento'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubiacion'];
    $usuario=$_SESSION["Usuario"];

    if(existeDato("Nombre",$nombreE,"evento")==1){
      $inf=consultaE($nombreE);
      $inf=$inf->fetch(PDO::FETCH_ASSOC);
      if($inf['Fecha']==$fecha){
          if($inf[$ubicacion]>0){
            if(existeDato("Serial",$serial,"boleto")==0){
              $inf[$ubicacion]--;
               $base=new PDO('mysql:host=localhost; dbname=tienda','root','');
               $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
               $base->exec("SET CHARACTER SET utf8");
               $sql="UPDATE `evento` SET `$ubicacion`='$inf[$ubicacion]' WHERE `Nombre`='$nombreE'";
              if($base->query($sql)){
                $sql1="INSERT INTO `boleto`(`Serial`, `Nombre_evento`, `Fecha`, `Ubicacion`, `Usuario`)
                       VALUES (:serialn,:eventon,:fechan,:ubicacionn,:usuarion)";
                $resultado=$base->prepare($sql1);
                $resultado->execute(array(":serialn"=>$serial,":eventon"=>$nombreE,":fechan"=>$fecha,":ubicacionn"=>$ubicacion,":usuarion"=>$usuario));
                $resultado->closeCursor();
                echo "<h2> Boleto registrado </h2>";
                echo "<table class='bolet'>
                        <tr>
                          <td><img src='imagenes/eventosE.png' width='5%' lang='5%' class='cav'></td>
                          <td><address>Tachira, Venezuela</address></td>
                        </tr>
                        <tr>
                           <td>Serial:</td>
                           <td>$serial</td>
                        </tr>
                        <tr>
                           <td>Evento:</td>
                           <td>$nombreE</td>
                        </tr>
                        <tr>
                           <td>Fecha:</td>
                           <td>$fecha</td>
                        </tr>
                        <tr>
                           <td>Ubicacion:</td>
                           <td>$ubicacion</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><small>&copy; 2020  Eventos E</small></td>
                        </tr>
                     </table>";
                     echo "<h2><a href='eventosE.php'>menu</a></h2>";
              }
           }else{
           echo "<h2>El boleto ya fue registrado</h2>";
           echo "<h2><a href='formularioBoleto.php'>resgitro</a></h2>";
           echo "<h2><a href='eventosE.php'>menu</a></h2>";
           }
          }else{
            echo "<h2>No hay lugares disponibles</h2>";
            echo "<h2><a href='formularioBoleto.php'>resgitro</a></h2>";
            echo "<h2><a href='eventosE.php'>menu</a></h2>";
          }

      }else{
        echo "<h2>La fecha del evento no concuerda con el evento</h2>";
        echo "<h2><a href='formularioBoleto.php'>resgitro</a></h2>";
        echo "<h2><a href='eventosE.php'>menu</a></h2>";
      }
    }else{
      echo "<h2>El evento no esta registrado Verifique el nombre</h2>";
      echo "<h2><a href='formularioBoleto.php'>resgitro</a></h2>";
      echo "<h2><a href='eventosE.php'>menu</a></h2>";
    }
  }catch(Exeception $e){
      echo "<h2>Ingreso invalido de los datos</h2>";
      echo "<h2><a href='formularioBoleto.php'>resgitro</a></h2>";
      echo "<h2><a href='eventosE.php'>menu</a></h2>";
  }finally{
    $base=null;
  }
}

?>
<footer>
   <address>Tachira, Venezuela</address>
   <small>&copy; 2020 Eventos E</small>
</footer>
  </body>
</html>
