<?php 


  require_once("modelo/productoModelo.php");

  $producto=new ProductosModelo();
  
  $matrizP=$producto->getProductos(); 

  require_once("vista/productoView.php");
   



?>