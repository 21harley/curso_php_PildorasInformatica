<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    include_once("../modelo/manejoObjeto.php");
    $miconexion=new PDO('mysql:localhost;dbname=dbblog','root','');
    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);   
    try{
        $manejoObjeto=new manejoObjeto($miconexion);
        $tablaBlog=$manejoObjeto->getContenidoPorFecha();
        if(empty($tablaBlog)){
            echo"No hay entradas de blog";
        }else{
            foreach($tablaBlog as $valor){
                echo"<h3>".$valor->getTitulo()."</h3></br>";
                echo"<h4>".$valor->getFecha()."</h4>";
                echo"<div style='width:400px'>";
                echo $valor->getComentario()."</div>";
                if($valor->getImagen!=""){
                    echo "<img src='../img/".$valor->getImagen."' width:'300px' height='200px' />";
                }
                echo "<hr/>";
            }
        }
    }catch(Execption $e){
        die("Error:".$e->getMenssage());
    }
?>
<br/>
<a href="index.php">Volver a la pagina de insercion</a>

</body>
</html>