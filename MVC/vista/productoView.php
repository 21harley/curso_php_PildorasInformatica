<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
    td{
     border:1px dotted #FF0000;
    }
    
    </style>
</head>
<body>
<table>

<tr>
<td>Nombre </td>
</tr>  
    <?php
    
    foreach($matrizP as $registro){
        echo "<tr><td>".$registro['Nombre']."</td></tr>";
    }
    
    ?>
</table>
</body>
</html>