<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/stilos.css">
  </head>
  <body>
    <?php
    include("funciones.php");
     session_start();
    if(!isset($_SESSION["Usuario"])){
    header("location:index.html");
  }else{
    $nombreT=$_POST['tipo'];
    $aux=0;
   switch($nombreT){

     case 'Detalles':
     $res=consultaB($_POST['serial']);
     $res=$res->fetch(PDO::FETCH_ASSOC);
     echo "<table class='bolet'>
             <tr>
               <td><img src='imagenes/eventosE.png' class='cav'></td>
               <td><address>Tachira, Venezuela</address></td>
             </tr>
             <tr>
                <td>Usuario:</td>
                <td>".$res['Usuario']."</td>
             </tr>
             <tr>
                <td>Serial:</td>
                <td>".$res['Serial']."</td>
             </tr>
             <tr>
                <td>Evento:</td>
                <td>".$res['Nombre_evento']."</td>
             </tr>
             <tr>
                <td>Fecha:</td>
                <td>".$res['Fecha']."</td>
             </tr>
             <tr>
                <td>Ubicacion:</td>
                <td>".$res['Ubicacion']."</td>
             </tr>
             <tr>
               <td></td>
               <td><small>&copy; 2020  Eventos E</small></td>
             </tr>
          </table>";
          echo "<h2><a href='ListadoRA.php'>menu</a></h2>";
     break;

     case 'Editar':
     $res=consultaB($_POST['serial']);
     $res=$res->fetch(PDO::FETCH_ASSOC);
     echo "
          <form action='funcionRA.php' method='post'>
            <table class='bolet'>
             <tr>
               <td><img src='imagenes/eventosE.png'  class='cav'></td>
               <td><address>Tachira, Venezuela</address></td>
             </tr>
             <tr>
                <td>Usuario:</td>
                <td><input type='hidden'name='giaU' value='".$res['Usuario']."' ><input type='text' name='Usuario' value='".$res['Usuario']."'></td>
             </tr>
             <tr>
                <td>Serial:</td>
                <td><input type='hidden'name='gia' value='".$res['Serial']."' ><input type='text' name='Serial' value='".$res['Serial']."'></td>
             </tr>
             <tr>
                <td>Evento:</td>
                <td><input type='hidden'name='giaNE' value='".$res['Nombre_evento']."' ><input type='text' name='NombreE' value='".$res['Nombre_evento']."'></td>
             </tr>
             <tr>
                <td>Fecha:</td>
                <td><input type='hidden'name='giaF' value='".$res['Fecha']."' ><input type='date' name='Fecha' value='".$res['Fecha']."'></td>
             </tr>
             <tr>
                <td>Ubicacion:</td>
                <td><input type='hidden'name='giaUB' value='".$res['Ubicacion']."' ><input type='text' name='Ubicacion' value='".$res['Ubicacion']."'></td>
             </tr>
             <tr>
               <td></td>
               <td><small>&copy; 2020  Eventos E</small></td>
             </tr>
             <tr>
               <td><input type='hidden'name='tipo' value='set' ></td>
               <td><input type='submit' name='enviar' value='Dale'></td>
             </tr>
           </table>
          </form>";
          echo "<h2><a href='ListadoRA.php'>menu</a></h2>";
     break;

     case 'Eliminar':
      $res=consultaB($_POST['serial']);
      $res=$res->fetch(PDO::FETCH_ASSOC);
      elimnarB($_POST['serial'],$_POST['ubicacion'],$res['Nombre_evento']);
      header("location:ListadoRA.php");
     break;

     case 'set':
     if($_POST['gia']!=$_POST['Serial']||$_POST['giaU']!=$_POST['Usuario']||$_POST['NombreE']!=$_POST['giaNE']||$_POST['Fecha']!=$_POST['giaF']||$_POST['Ubicacion']!=$_POST['giaUB']){

       if($_POST['gia']!=$_POST['Serial']&&existeDato("Serial",$_POST['gia'],"boleto")!=0){
         echo "<h3>Error el serial esta en uso </h3>";$aux=1;
         echo "<h3><a href='ListadoRA.php'>menu</a></h3>";
       }else if($_POST['giaU']!=$_POST['Usuario']&&existeDato("Usuario",$_POST['Usuario'],"usuario")==0){
         echo "<h3>Error el usuario no existe</h3>";$aux=1;
         echo "<h3><a href='ListadoRA.php'>menu</a></h3>";
       }else if($_POST['NombreE']!=$_POST['giaNE']&&existeDato("Nombre",$_POST['NombreE'],"evento")==0){
         echo "<h3>Error el evento no existe</h3>";$aux=1;
         echo "<h3><a href='ListadoRA.php'>menu</a></h3>";
       }else if($_POST['Fecha']!=$_POST['giaF']&&existeDato("Fecha",$_POST['Fecha'],"evento")==0){
         echo "<h3>Error la fecha es incorrecta </h3>";$aux=1;
         echo "<h3><a href='ListadoRA.php'>menu</a></h3>";
       }else if($_POST['Ubicacion']!=$_POST['giaUB']||$_POST['NombreE']!=$_POST['giaNE']){
         switch($_POST['Ubicacion']){
           case "Alto":case "Medio":case "VIP":case "Platino":
           $inf=consultaE($_POST['NombreE']);
           $inf=$inf->fetch(PDO::FETCH_ASSOC);
           if($inf[$_POST['Ubicacion']]>0){
              consultaCa($_POST['Serial'],$_POST['Ubicacion'],$_POST['NombreE'],1);
              consultaCa($_POST['gia'],$_POST['giaUB'],$_POST['giaNE'],0);
           }else{
             echo "<h3>Error no existe cupos en esa ubicacion </h3>";
             echo "<h3><a href='ListadoRA.php'>menu</a></h3>";$aux=1;
           }
           break;
           default:
           echo "<h3>Error no existe esa ccategoria de Ubicacion </h3>";
           echo "<h3><a href='ListadoRA.php'>menu</a></h3>"; $aux=1;
           break;
         }
       }
       if($aux==0){
         editar($_POST['gia'],$_POST['Serial'],$_POST['NombreE'],$_POST['Fecha'],$_POST['Ubicacion'],$_POST['Usuario']);
         header("location:ListadoRA.php");
       }
     }else{
        header("location:ListadoRA.php");
     }

     break;

     case "editU":

     break;
   }
  }

     ?>
  </body>
</html>
