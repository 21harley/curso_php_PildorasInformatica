<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
   <link rel="stylesheet" href="css/stilos.css">
    <title></title>
  </head>
  <body>
<?php
require("funciones.php");
$base; $good=0; $user;
$nombre=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$direccion=$_POST['direccion'];
$sexo=$_POST['sexo'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$nombre_usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$user=$nombre_usuario;
$acceso="u";
$c=$_POST['cedu'].$_POST['cedula'];
$cedula=(string)$_POST['cedula'];
$aux=(int)$_POST['cedula'];
$aux=(string)$aux;
if(strlen($aux)!=strlen($cedula)){
  $good=3;
}
if(existeDato("Correo",$correo,"usuario")>0){ echo "<h3>Correo ya fue registrado con un usuario</h3>";$good=1;}
if(existeDato("Usuario",$user,"usuario")>0){ echo "<h3>El nombre de usuario ya existe</h3>";$good=1;}
if(existeDato("Clave",$clave,"usuario")>0){ echo "<h3>La clave ya existe</h3>";$good=1;}

if(existeDato("Cedula",$c,"usuario")>0&&$good!=1){ echo "<h3>La cedula ya fue registrada</h3>";$good=1;}

if($good==0){
try{
  $base=new PDO('mysql:host=localhost; dbname=tienda','root','');

   $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

   $base->exec("SET CHARACTER SET utf8");

   $sql="INSERT INTO `usuario`(`Nombres`, `Apellidos`, `Cedula`, `Direccion`, `Sexo`, `Telefono`, `Correo`, `Usuario`, `Clave`,`Acceso`)
         VALUES (:nombren,:apellidosn,:cedulan,:direccionn,:sexon,:telefonon,:correon,:nombre_usuarion,:claven,:acceson)";

   $resultado=$base->prepare($sql);


   $resultado->execute(array(":nombren"=>$nombre,":apellidosn"=>$apellidos,":cedulan"=>$c,":direccionn"=>$direccion,":sexon"=>$sexo,
                             ":telefonon"=>$telefono,":correon"=>$correo,":nombre_usuarion"=>$nombre_usuario,":claven"=>$clave,":acceson"=>$acceso));

   $resultado->closeCursor();
  $good=1;
  }catch(Exception $e){

   die('Error:'.$e->GetMessage());

   $base=null;

  }finally{

   $base=null;
  }

  if($good==1){
     echo "<img src='imagenes/eventosE.png' alt='' width='25%'  lang='25%'>";
     echo "<br><h2>Bienvenido ".$user."</h2>";
     echo "<br><h2>Registro completado con exicto</h2>";
     echo "<br><h3><a href='index.html'>iniciar</a></h3>";
  }else{
    echo "<br><h2> Error de conexion <h2>";
    echo "<br><h2><a href='index.html'>volver</a></h2>";
  }
}else if($good==3){
  echo "<br><h2>Los datos de la cedula son solo numericos<h2>";
  echo "<br><h2><a href='formularioRegistro.html'>Registro</a></h2>";
}else{
  echo "<br><h2>Los datos no son validos por favor volver a intentar<h2>";
  echo "<br><h2><a href='formularioRegistro.html'>Registro</a></h2>";
}

 ?>
 <footer>
    <address>Tachira, Venezuela</address>
    <small>&copy; 2020 Eventos E</small>
 </footer>
  </body>
</html>
