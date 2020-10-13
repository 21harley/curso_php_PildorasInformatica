<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
   <link rel="stylesheet" href="css/stilos.css">
    <title></title>
  </head>
  <body>
<header >
</header>
<div class="formularioR" style="width:23%">
  <img  src="imagenes/eventosE.png"  width="40%" lang="40%">
   <h3> Registro Usuarios</h3>
 <form class="" action="registroU.php" method="post">
   <table>
     <tr>
       <td>Nombres:</td><td> <input type="text" name="nombres" value="" id="nobres" required> </td>
     </tr>
     <tr>
       <td>Apellidos:</td><td> <input type="text" name="apellidos" value="" id="apellidos" required> </td>
     </tr>
     <tr>
       <td></td><td>Cedula:</td>
     </tr>
     <tr>
       <td>Numero:</td> <td> <input type="text" name="cedula" value="" id="cedula" required> </td>
     </tr>
     <tr>
       <td> <input type="radio" name="cedu" value="V" id="cedu" required>V</td>
       <td> <input type="radio" name="cedu" value="E" id="ceddula" required>E</td>
     </tr>
     <tr>
       <td>Direccion:</td> <td> <input type="text" name="direccion" value="" id="direccion" required> </td>
     </tr>
     <tr>
       <td>Sexo:</td>
        <td> <input type="radio" name="sexo" value="hombre" id="sexo">Hombre</td>
        <td> <input type="radio" name="sexo" value="mujer" id="sexo">Mujer</td>
     </tr>
     <tr>
       <td>Telefono:</td> <td> <input type="tel" name="telefono" value="" id="telefono"> </td>
     </tr>
     <tr>
       <td>Correo:</td> <td> <input type="email" name="correo" value="" id="correo" required> </td>
     </tr>
     <tr>
       <td>Nombre Usuario:</td> <td> <input type="text" name="usuario" value="" id="usuario" required> </td>
     </tr>
     <tr>
       <td>Clave:</td> <td> <input type="text" name="clave" value="" id="clave" required> </td>
     </tr>
     <tr>
       <td> <input type="submit" name="enviar" value="enviar"> </td>
       <td> <input type="reset" name="borrar" value="borrar"> </td>
     </tr>
   </table>
 </form>
 <h3><a href="index.html" >inicio</a></h3>
</div>
<footer>
   <address>Tachira, Venezuela</address>
   <small>&copy; 2020 Eventos E</small>
</footer>
  </body>
</html>
