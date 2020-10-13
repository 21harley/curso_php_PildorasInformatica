<?php

function conex(){
  $conecion=new PDO('mysql:host=localhost; dbname=tienda','root','');
  return $conecion;
}

function existeDato($dato,$nombre,$tabla){
  $total=0;
  $base=conex();
  $sql="SELECT `$dato` FROM `$tabla` WHERE `$dato`='$nombre'";
  $res=$base->prepare($sql);
  $res->execute();
  $retor=$res->fetchAll();
   foreach ($retor as $key ) {
     $total++;
   };
   return $total;
}

function consultaTabla($dato,$nombre,$tabla){
  $base=conex();
  $sql="SELECT `$dato` FROM `$tabla` WHERE `$dato`='$nombre'";
  $res=$base->query($sql);
   return $res;
}

function consultaTa($dato,$nombre,$tabla){
  $base=conex();
  $sql="SELECT * FROM `$tabla` WHERE `$dato`='$nombre'";
  $res=$base->prepare($sql);
  $res->execute();
  $retor=$res->fetchAll();
  return $retor;
}

function consultaU($usuario){
  $base=conex();
  $sql="SELECT * FROM `usuario` WHERE `Usuario`='$usuario'";
  $res=$base->query($sql);
  return $res;
}

function consultaE($nombre){
  $base=conex();
  $sql="SELECT * FROM `evento` WHERE `Nombre`='$nombre'";
  $res=$base->query($sql);
  return $res;
}

function consultaB($serial){
  $base=conex();
  $sql="SELECT * FROM `boleto` WHERE `Serial`='$serial'";
  $res=$base->query($sql);
  return $res;
}

function elimnarB($serial,$ubicacion,$nombreE){
  $inf=consultaE($nombreE);
  $inf=$inf->fetch(PDO::FETCH_ASSOC);
   $inf[$ubicacion]++;
  $base=conex();
  $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $base->exec("SET CHARACTER SET utf8");
  $sql="UPDATE `evento` SET `$ubicacion`='$inf[$ubicacion]' WHERE `Nombre`='$nombreE'";
  $base->query($sql);
  $sql="DELETE FROM `boleto` WHERE `Serial`=$serial";
  $res=$base->query($sql);
  return $res;
}

function editar($serial,$serial2,$nombreE,$fecha,$ubicacion,$usuario){
  $base=conex();
  $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $base->exec("SET CHARACTER SET utf8");
  $sql="UPDATE `boleto` SET `Serial`='$serial2',`Nombre_evento`='$nombreE',
        `Fecha`='$fecha',`Ubicacion`='$ubicacion',`Usuario`='$usuario' WHERE `Serial`='$serial'";
  $base->query($sql);
}

function consultaT($table){
  $base=conex();
  $sql="SELECT * FROM `$table`";
  $res=$base->prepare($sql);
  $res->execute();
  $retor=$res->fetchAll();
  return $retor;
}
function consultaCa($serial,$ubicacion,$nombreE,$tipo){
  $inf=consultaE($nombreE);
  $inf=$inf->fetch(PDO::FETCH_ASSOC);
  if($tipo==1){
    $inf[$ubicacion]--;
  }else{
    $inf[$ubicacion]++;
  }
  $base=conex();
  $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $base->exec("SET CHARACTER SET utf8");
  $sql="UPDATE `evento` SET `$ubicacion`='$inf[$ubicacion]' WHERE `Nombre`='$nombreE'";
  $base->query($sql);
}
?>
