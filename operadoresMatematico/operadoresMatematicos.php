<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<p>&nbsp;</p>
<form name="form" method="post" action=" ">
<p>
  <label for="num1" ></label>
  <input type="text" name="num1" id="num1">
  <label for="num2 "></label>
  <input type="text" name="num2" id="num2">
  <label for="operation"></label>
  <select name="operation" id="operation">
    <option>Suma</option>
    <option>Resta</option>
    <option>Multiplicacion</option>
    <option>Division</option>
    <option>Modulo</option>
</p>
<p>
<br><input type="submit" name="button" id="button" value="Enviar" onclick="prueba">
</p>
</form>
<p>&nbsp;</p>
<?php
if(isset($_POST["button"])){
  $num1=$_POST["num1"];
  $num2=$_POST["num2"];
  $opera=$_POST["operation"];
  $resul;
  switch ($opera) {
      case 'Suma':
      echo "La suma es ".($num1+$num2);
      break;
      case 'Resta':
      echo "La Resta es ".($num1-$num2);
      break;
      case 'Modulo':
      echo "El modulo es ".($num1%$num2);
      break;
      case 'Multiplicacion':
      echo "La multiplicacion es ".($num1*$num2);
      break;
      case 'Division':
      echo "La divicion es ".($num1/$num2);
      break;
    default:
      // code...
      break;
  }
}
 ?>
  </body>
</html>
