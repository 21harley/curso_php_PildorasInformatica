<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
       
    if(isset($_COOKIE["idioma"])){
        if($_COOKIE["idioma"]=="es"){
            header("Location:spanish.php");
        }else if($_COOKIE["idioma"]=="in"){
            header("Location:english.php");
        }
    }
?>
    <div>
        <a href="creaCookie.php?idioma=es"><img src="img/españa.png" alt=""></a>
        <a href="creaCookie.php?idioma=in"><img src="img/inglaterra.png" alt=""></a>
        <a href="close.php">Eliminar Cookie</a>
    </div>
    
</body>
</html>