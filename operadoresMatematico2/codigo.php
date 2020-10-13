<style>
 .stilo{
   color: #F00;
 }
</style>

<?php
if(isset($_POST["button"])){
  $num1=$_POST["num1"];
  $num2=$_POST["num2"];
  $opera=$_POST["operation"];
   operacion($opera);
}
function operacion($o){
  global $num1;
  global $num2;
  switch ($o) {
      case 'Suma':
      $resul=$num1+$num2;
      echo "<p class='stilo'>La suma es $resul</p>";
      break;
      case 'Resta':
      $resul=$num1-$num2;
      echo "<p class='stilo' La Resta es $resul </P>";
      break;
      case 'Modulo':
      $resul=$num1%$num2;
      echo "<p class='stilo' La modulo es $resul </P>";
      break;
      case 'Multiplicacion':
      $resul=$num1*$num2;
      echo "<p class='stilo' El multiplicacion es $resul </P>";
      break;
      case 'Division':
      $resul=$num1/$num2;
      echo "<p class='stilo' La divicion es $resul </P>";
      break;
    default:
      // code...
      break;
  }
}
 ?>
