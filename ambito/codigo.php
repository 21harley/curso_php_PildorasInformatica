<?php //ambito de otro archivo de otra persona
//al utilisar la variable en otro codigo no se sobre escribe php
//se comporta rudo en los ambitos para evitar cambiar su valor
function dameNombre(){
   $nombre="Maria";
   echo $nombre."<br>";//ambito funcion
}

?>
