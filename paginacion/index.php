<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    try{ 
        $base=new PDO('mysql:host=localhost; dbname=tienda','root','');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8");
         
        $tamaP=2;
        if(isset($_GET["pagina"])){
            if($_GET["pagina"]==1){
                header("Location:index.php");
            }else{
                $pagina=$_GET["pagina"];
            }
        }else{
            $pagina=1;
        }
        $empezar=($pagina-1)*$tamaP;

        $sql="SELECT * FROM `usuario` ";
        $resultado=$base->prepare($sql);
        $resultado->execute(array());

        $numF=$resultado->rowCount();
        $totalP=ceil($numF/$tamaP);

        echo "Numero de registro de consulta:".$numF."<br>";
        echo "Motramos ".$tamaP." registro por paginas <br>";
        echo "Mostrando la pagina ".$pagina." de ".$totalP." <br>";

        $resultado->closeCursor();
        
        $sql="SELECT * FROM `usuario` LIMIT $empezar,$tamaP";
        $resultado=$base->prepare($sql);
        $resultado->execute(array());
        

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            echo "nombre:".$registro["Nombres"]."<br>";
        }


    }catch(Exception $e){
        die("Error".$e->getMessage());
        echo "Linea del error".$e->getLine();
    }

    //-------------------------------------------------------
    for($i=1;$i<=$totalP;$i++){
        echo " <a href='?pagina=".$i."'> ".$i."</a>  ";
    }

?>
</body>
</html>