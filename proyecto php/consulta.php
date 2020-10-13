<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilos.css">
    <title></title>
  </head>
  <body>
  <?php
    if(isset($_POST["dale"])){
        try{
          $base=new PDO("mysql:host=localhost; dbname=tienda","root","");
          $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $sql="SELECT `Usuario`,`Clave` FROM `usuario` WHERE  `Usuario`= :usua AND `Clave`= :pass";
          $resultado=$base->prepare($sql);
          $login=htmlentities(addslashes($_POST["usuario"]));
          $password=htmlentities(addslashes($_POST["clave"]));
          $resultado->bindValue(":usua",$login);
          $resultado->bindValue(":pass",$password);

          $resultado->execute();
          $numero_registro=$resultado->rowCount();
          if($numero_registro!=0){
            session_start();//seccion de usuario registrado
            $_SESSION["Usuario"]=$_POST["usuario"];
            header("location:eventosE.php");
          }
          else{
            header("location:index.html");
          }
        }catch(Exeception $e){
          die("Error:".$e->getMessage());
        }
    }
    ?>
  <footer>
     <address>Tachira, Venezuela</address>
     <small>&copy; 2020 Eventos E</small>
  </footer>
  </body>
</html>
