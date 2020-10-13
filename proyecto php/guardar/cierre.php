<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
   session_start();
   session_destroy();
   header("location:index.html");
 ?>
  </body>
</html>
