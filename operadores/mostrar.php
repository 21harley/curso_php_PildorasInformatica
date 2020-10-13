
<style>
h1{
  text-align:center;
}
table{
  background-color: #FFC;
  padding: 5px;
  border: #666 5px solid;
}
.no_valido{
  font-size: 18px;
  color:#F00;
  font-weight: bold;
}
.valido{
  font-size: 18px;
  color:#0C3;
  font-weight: bold;
}
</style>

<?php
if(isset($_POST["e"])){
  $usuario=$_POST["nombre_usuario"];
  $edad=$_POST["edad_usuario"];
  if($usuario=="john"){
   echo "<p class=\"valido\" > Puedes entrar </p>";
 }else{
   echo "<p class=\"no_valido \">No puedes entrar </P>";
 }
}

   /*
   $var1=1;
   $var2=1;
   if($var1===$var2) echo "Var2 y Var3 son iguales<br>";
   else echo "Var2 y Var3 son son iguales <br>";
   if($var1<>$var2) echo "Son direfentes <br>";
   else echo "No son diferentes <br>";
   */
 ?>
