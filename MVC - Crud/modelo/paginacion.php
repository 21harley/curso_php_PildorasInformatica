<?php

   require_once("conectar.php");
  /*
  $conexion=$base->query(`SELECT * FROM datosusuarios `);
  $registros=$conexion->fetchALL(PDO::FETCH_OBJ);//crear un array de obj
  */
  /*--------paginacion----------------*/
  $base=conectar::conexion();
  $tamaP=2;
  if(isset($_GET["pagina"])){
      if($_GET["pagina"]==1){
          header("Location:index.php");
      }else{
          $pagina=$_GET["pagina"];
      }
  }else{
      $pagina=1;
  }
  $empezar=($pagina-1)*$tamaP;

  $sql="SELECT * FROM `datosusuarios` ";
  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  $numF=$resultado->rowCount();
  $totalP=ceil($numF/$tamaP);

/*------------------------------------------------*/

  $registros=$base->query("SELECT * FROM `datosusuarios` LIMIT $empezar,$tamaP")->fetchALL(PDO::FETCH_OBJ);
  if(isset($_POST["cr"])){
    $nom=$_POST["nom"];
    $ape=$_POST["ape"];
    $dir=$_POST["dir"];
    $sql="INSERT INTO `datosusuarios`(`Nombre`, `Apellido`, `Direccion`) VALUES (:nom,:ape,:dir)";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":nom"=>$nom,":ape"=>$ape,":dir"=>$dir));
    header("Location:index.php");
  }
  
?>