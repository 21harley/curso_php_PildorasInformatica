<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <link rel="stylesheet" href="css/stilos.css">
  </head>
  <body>
    <header >
    </header>
<?php
 session_start();
if(!isset($_SESSION["Usuario"])){
header("location:index.html");
}
?>
    <div class='formularioR' style='width:23%' >
      <img  src='imagenes/eventosE.png'  width='40%' lang='40%'>
      <h3> Registro Usuarios</h3>
  <form class='' action='registroU.php' method='post'>
    <table>
<?php
include("funciones.php");
$res=consultaB($_SESSION["Usuario"]);
$res=$res->fetch(PDO::FETCH_ASSOC);
echo "
     <tr>
       <td>Nombres:</td>
       <td>
         <input type='text' name='nombres' 'value='".$_SESSION["Usuario"]."' id='nombres' required>
         <input type='hidden' name='nombresN' 'value='".$_SESSION["Usuario"]."' id='nombres' required>
       </td>
     </tr>
     <tr>
       <td>Apellidos:</td>
       <td>
       <input type='txt' name='apellidos' value='".$_SESSION["Usuario"]."' id='apellidos' required>
       <input type='hidden' name='apellidosN' value='".$_SESSION["Usuario"]."' id='apellidos' required>
       </td>
     </tr>
     <tr>
       <td></td><td>Cedula:</td>
     </tr>
     <tr>
       <td>Numero:</td> <td> <input type='txt' name='cedula' value='' id='cedula' required> </td>
     </tr>
     <tr>
       <td> <input type='radio' name='cedu' value='V' id='cedu' required checked>V</td>
       <td> <input type='radio' name='cedu' value='E' id='ceddula' required >E</td>
     </tr>
     <tr>
       <td>Direccion:</td>
        <td>
        <input type='text' name='direccion' value='".$_SESSION["Usuario"]."' id='direccion' required>
        <input type='hiddent' name='direccion' value='".$_SESSION["Usuario"]."' id='direccion' required>
        </td>
     </tr>
     <tr>
       <td>Sexo:</td>
        <td> <input type='radio' name='sexo' value='hombre' id='sexo'>Hombre</td>
        <td> <input type='radio' name='sexo' value='mujer' id='sexo'>Mujer</td>
     </tr>
     <tr>
       <td>Telefono:</td>
       <td>
        <input type='tel' name='telefono' value='".$_SESSION["Usuario"]."' id='telefono'>
        <input type='hidden' name='telefono' value='".$_SESSION["Usuario"]."' id='telefono'>
       </td>
     </tr>
     <tr>
       <td>Correo:</td>
       <td>
       <input type='email' name='correo' value='".$_SESSION["Usuario"]."' id='correo' required>
       <input type='hidden' name='correo' value='".$_SESSION["Usuario"]."' id='correo' required>
        </td>
     </tr>
     <tr>
       <td>Nombre Usuario:</td>
        <td>
        <input type='text' name='usuario' value='".$_SESSION["Usuario"]."' id='usuario' required>
        <input type='hidden' name='usuario' value='".$_SESSION["Usuario"]."' id='usuario' required>
        </td>
     </tr>
     <tr>
       <td>Clave:</td>
         <td>
         <input type='text' name='clave' value='".$_SESSION["Usuario"]."' id='clave' required>
         <input type='hidden' name='clave' value='".$_SESSION["Usuario"]."' id='clave' required>
          </td>
     </tr>
     <tr>
       <td> <input type='submit' name='enviar' value='enviar'><input type='hidden'name='tipo' value='editU' > </td>
       <td> <input type='reset' name='borrar' value='borrar'> </td>
     </tr>";
?>
  </table>
  </form>
</div>
 <h3><a href='eventosE.php' >menu</a></h3>
<footer>
   <address>Tachira, Venezuela</address>
   <small>&copy; 2020 Eventos E</small>
</footer>
  </body>
</html>
