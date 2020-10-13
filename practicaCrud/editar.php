<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <div>
    <h1>Actualizar</h1>
    <?php
      include("conexion.php");
      if(!isset($_POST["bot_actualizar"])){
        $Id=$_GET["id"];
        $nom=$_GET["nom"];
        $ape=$_GET["ape"];
        $dir=$_GET["dir"];
      }else{      
        $Id=$_POST["id"];
        $nom=$_POST["nom"];
        $ape=$_POST["ape"];
        $dir=$_POST["dir"];
      /*
        $sql="UPDATE `datosusuarios` SET `Id`='$Id',`Nombre`='$nom',`Apellido`='$ape',`Direccion`='$dir' WHERE  ";
      */
      $sql="UPDATE `datosusuarios` SET `Nombre`=:miNom,`Apellido`=:miApe,`Direccion`=:miDir  WHERE `Id`=:miId";
      $resultado=$base->prepare($sql);
      $resultado->execute(array(":miId"=>$Id,":miNom"=>$nom,":miApe"=>$ape,":miDir"=>$dir));
      header("Location:index.php");
    }

    ?>
    <p>&nbsp;</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table>
    <tr>
      <td></td>
      <td><label for="id"><input type="hidden" name="id" id="id" value="<?php echo $Id ?>"></label> </td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><label for="nom"><input type="txt" name="nom" id="nom" value="<?php echo $nom ?>"></label> </td>
    </tr>
    <tr>
      <td>Apellido:</td>
      <td><label for="ape"><input type="txt" name="ape" id="ape" value="<?php echo $ape ?>"></label> </td>
    </tr>
    <tr>
      <td>Direccion:</td>
      <td><label for="dir"><input type="txt" name="dir" id="dir" value="<?php echo $dir ?>"></label> </td>
    </tr>
    <tr>
     <td colaspan="2"> <input type="submit" name="bot_actualizar" id="bot_acutalizar" value="Actualizar"></td>
    </tr>   
    </table>
    </form>
    </div>
</body>
</html>