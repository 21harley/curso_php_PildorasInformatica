<?php

    include("conexion.php");
    
    $Id=$_GET["Id"];

    $base->query("DELETE FROM `datosusuarios` WHERE ID='$Id'");

    header("Location:index.php");

?>