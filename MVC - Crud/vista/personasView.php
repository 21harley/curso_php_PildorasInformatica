<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
   body{
    margin: 0;
    padding: 0;
    background-color: green;
    color: white;
    text-align:center;
    height: 90vh;
    width: 100%;
    }

  .contain{
    height: 90vh;
    width: 100%;
  }

  .tablaCrud{
    position: relative;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    background-color: black;
  }

  .primeraFila{
    color: black;
    background-color: white;
  }
    </style>
</head>
<body>
<?php
    require("modelo/paginacion.php")
?>
   <div class="contain">
   <h1>MVC-Crud pildoras </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
     <table class="tablaCrud">
       <tr>
        <td class="primeraFila" >ID</td>
        <td class="primeraFila" >Nombre</td>
        <td class="primeraFila" >Apellido</td>
        <td class="primeraFila" >Direccion</td>
        <td class="sin" >&nbsp;</td>
        <td class="sin" >&nbsp;</td>
        <td class="sin" >&nbsp;</td>
       </tr>

      <?php
        //se repitira por cada usuario de registro
        foreach($matrizP as $usuario):
      ?>
       <tr>
        <td><?php echo $usuario['Id'] ?></td>
        <td><?php echo $usuario['Nombre']?></td>
        <td><?php echo $usuario['Apellido'] ?></td>
        <td><?php echo $usuario['Direccion']?></td>
        <td class="bot"><a href="borrar.php?Id=<?php echo $usuario['Id']?>"><input  type="button"  name="del" value="Borrar"></a></td>
        <td class="bot"><a href="editar.php?id=<?php echo $usuario['Id']?> &nom=<?php echo $usuario['Nombre']?>&ape=<?php echo $usuario['Apellido'] ?>&dir=<?php echo $usuario['Direccion'] ?>"><input type="button"  name="up" value="Actualizar"></a></td>
       </tr>
       <?php
        endforeach
       ?>

      <tr>
        <td></td>
        <td> <input type="txt" name="nom" size="10" class="centrado"> </td>
        <td> <input type="txt" name="ape" size="10" class="centrado"> </td>
        <td> <input type="txt" name="dir" size="10" class="centrado"> </td>
        <td class="bot"> <input type="submit" name="cr" id="cr" value="insertar"> </td>
      </tr>
    </table>
    </form>
    <?php
      
      //--------------------Paginas----------------------------
      //-------------------------------------------------------
      for($i=1;$i<=$totalP;$i++){
        echo " <a href='?pagina=".$i."'> ".$i."</a>  ";
      }
      //-------------------------------------------------------    
     
      ?>
</body>
</html>