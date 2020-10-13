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
  $good=0;$base;
  try{
    $nombre=$_POST['nombre'];
    $fecha=(string)$_POST['fecha'];
    $alto=(int)$_POST['alto'];
    $medio=(int)$_POST['medio'];
    $vip=(int)$_POST['vip'];
    $platino=(int)$_POST['platino'];
    if(existeDato("Nombre",$nombre,"evento")==0){
       $base=new PDO('mysql:host=localhost; dbname=tienda','root','');

       $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

       $base->exec("SET CHARACTER SET utf8");

       $sql="INSERT INTO `evento`(`Nombre`, `Fecha`, `Alto`, `Medio`, `VIP`, `Platino`)
             VALUES (:nombren,:fechan,:alton,:medion,:vipn,:platinon)";

       $resultado=$base->prepare($sql);


       $resultado->execute(array(":nombren"=>$nombre,":fechan"=>$fecha,":alton"=>$alto,":medion"=>$medio,":vipn"=>$vip,":platinon"=>$platino));

       $resultado->closeCursor();
       $good=1;
    }else{
       echo "<h3>No se puede crear el nombre esta en uso</h3>";
       echo "<h3><a href='eventosE.php'>menu</h3>";
    }

  }catch(Exception $e){
    die('Error:'.$e->GetMessage());
    echo "<h2>Error al ingresar los datos<h2>";
    echo "<h2><a href='eventosE.php'>menu</h2>";
    $base=null;
  }finally{
    $base=null;
  }

  if($good==1){
    echo "<img src='imagenes/eventosE.png' alt='' width='20%'  lang='20%'>";
    echo "<br><h2>El registro se completado con exicto </h2>";
    echo "<br><h3><a href='eventosE.php'>menu</a></h3>";
  }

}

?>
<footer>
   <address>Tachira, Venezuela</address>
   <small>&copy; 2020 Eventos E</small>
</footer>
  </body>
</html>
