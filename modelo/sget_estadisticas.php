<?php

class estadisticas{

  protected $clientes="";
  protected $colaborador="";
  protected $news="";

  function setcliente($pcliente){
    $this->clientes=$pcliente;
  }

  function getcliente(){
    return $this->clientes;
  }

  function setcolaborador($pcolaborador){
    $this->colaborador=$pcolaborador;
  }

  function getcolaborador(){
    return $this->colaborador;
  }

  function setnews($pnews){
    $this->news=$pnews;
  }

  function getnews(){
    return $this->news;
  }

  function capcliente(){
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, 'select count (id_usuario) from usuario');
    while ($dato = pg_fetch_array($result)) {
      $total_user = $dato["count"];
    }
    $this->setcliente($total_user);
    pg_close($conexion);
  }

  function capcolaborador(){
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, 'select count (id_colaborador) from colaborador');
    while ($dato = pg_fetch_array($result)) {
      $total_colaboradores = $dato["count"];
    }
    $this->setcolaborador($total_colaboradores);
    pg_close($conexion);
  }

  function capnewsletters(){
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, 'select count (id_newsletter) from newsletter');
    while ($dato = pg_fetch_array($result)) {
      $total_news = $dato["count"];
    }
    $this->setnews($total_news);
    pg_close($conexion);
  }
}
?>
