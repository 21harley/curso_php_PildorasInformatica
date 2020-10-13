<?php
include_once("objetoBlog.php");

class ManejoObj{
    /*atributos*/ 
    private $conexion;
    /*contructor*/
    public function __construct($conexion){
        $this->setConexion($conexion);
    }
    /*metodos*/
    public function setConexion($conexion){
        $this->conexion=$conexion;
    }

    public function getContenidoPorFecha(){
       $matriz=array();
       $contador=0;
       $resultado=$this->conexion->query("SELECT * FROM `contenido` ORDER BY `FECHA`"); 
       while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
           
           $blog=new ObjetoBlog();
           $blog->setId($resgitro["Id"]);
           $blog->setTitulo($resgitro["Titulo"]);
           $blog->setFecha($resgitro["Fecha"]);
           $blog->setComentario($resgitro["Comentario"]);
           $blog->setImagen($resgitro["Imagen"]);
           
           $matriz[$contador]=$blog;
           $contador++;
       }
       return $matriz;
    }

    public function insertarContenido($blog){
$sql="INSERT INTO `contenido` (`Titulo`, `Fecha`, `Comentario`, `Imagen`) VALUES ('".$blog->getTitulo()."','".$blog->getFecha()."','".$blog->getComentario()."','".$blog->getImagen()."')";
        $this->conexion->exec($sql);
    }
}

?>