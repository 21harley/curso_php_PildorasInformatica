<?php 

  require_once("modelo/personasModelo.php");

  $personas=new PersonasModelo();
  
  $matrizP=$personas->getPersonas(); 

  require_once("vista/personasView.php");
   
?>