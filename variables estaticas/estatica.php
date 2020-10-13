<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $contador=0;
    $i=0;
  function incrementarvariable(){
    global $contador;
    static $suma=0;//cuando se salga de la funcion
    //mantedra su valor
    $contador++;$suma++;
    echo $contador."variable global <br>";
    echo $suma ."variabl static <br>";
  }
while(5>$i){
  incrementarvariable();
  $i++;
}
   ?>
  </body>
</html>
