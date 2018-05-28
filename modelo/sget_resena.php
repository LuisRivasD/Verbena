<?php

class resena{
  protected $identificador="";
  protected $titulo="";
  protected $autor="";
  protected $fecha_pub="";
	protected $hora_pub="";
	protected $contenido="";

  function setid($pidentificador){
    $this->identificador = $pidentificador;
  }

  function getid(){
    return $this->identificador;
  }

  function settitulo($ptitulo){
    $this->titulo = $ptitulo;
  }

  function gettitulo(){
    return $this->titulo;
  }

  function setautor($pautor){
    $this->autor = $pautor;
  }

  function getautor(){
    return $this->autor;
  }

  function setfechapub($pfecha_pub){
    $this->fecha_pub = $pfecha_pub;
  }

  function getfechapub(){
    return $this->fecha_pub;
  }

  function sethorapub($phora_pub){
    $this->hora_pub = $phora_pub;
  }

  function gethorapub(){
    return $this->hora_pub;
  }

  function setcontenido($pcontenido){
    $this->contenido = $pcontenido;
  }

  function getcontenido(){
    return $this->contenido;
  }

  function tablaresena($id_ope){
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, 'select * from resena where id_resena ='.$id_ope);
    while ($dato = pg_fetch_array($result)){

      $this->setid($dato['id_resena']);
      $this->settitulo($dato['titulo']);
      $this->setautor($dato['autor']);
      $this->setfechapub($dato['fecha_pub']);
      $this->sethorapub($dato['hora']);
      $this->setcontenido($dato['descripcion']);
    }
    pg_close($conexion);
  }

  function leer($id){
    include 'basedatos/conexion.php';
    // $result=pg_query($conexion, 'select * from resena where id_resena ='.$id_ope);
    $result=pg_query($conexion, 'select * from resena where id_resena =' .$id);
    while ($dato = pg_fetch_array($result)){
      $this->setid($dato['id_resena']);
      $this->settitulo($dato['titulo']);
      $this->setautor($dato['autor']);
      $this->setfechapub($dato['fecha_pub']);
      $this->sethorapub($dato['hora']);
      $this->setcontenido($dato['descripcion']);
    }pg_close($conexion);

    ?>
    <h4><?php echo $this->gettitulo(); ?></h4>
    <div class="datos_resena">

      <div class="img_escritor">
        <img src="img/shoot_verbena.png" alt="">
      </div>

        <div class="datos_escritor">
          <span class="nombre_autor"><?php echo $this->getautor(); ?></span><br>
          <span class="puesto_autor">Team Verbena de la Buena</span><br>
          <span class="fecha_pub"><?php echo $this->getfechapub() .", "; ?></span>
          <span class="hora_pub"><?php echo $this->gethorapub(); ?></span>
        </div>

      </div>
      <article class="parrafo_resena">
        <?php echo $this->getcontenido(); ?>
      </article>

    <?php

  }

  function insertaResena(){
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, 'select * from resena order by id_resena desc');
    while ($dato = pg_fetch_array($result)){
      $this->setid($dato['id_resena']);
      $this->settitulo($dato['titulo']);
      $this->setautor($dato['autor']);
      $this->setfechapub($dato['fecha_pub']);
      $this->sethorapub($dato['hora']);
      $this->setcontenido($dato['descripcion']);
      ?>
      <div class="itemResena">
        <h5><?php echo substr(strtoupper($this->gettitulo()),0,15)."..."; ?></h5>
        <details>
          <summary>DETALLES</summary>
          <span class="autor"><strong class="s">Autor: </strong><?php echo $this->getautor(); ?></span><br>
          <span class="fecha"><strong class="s">Públicada: </strong><?php echo $this->getfechapub().", ".$this->gethorapub()."H" ?></span><br>
          <a href="leer_resena.php?id=<?php echo $this->getid(); ?>">LEER RESEnA</a>
        </details>
      </div>

      <?php
    }pg_close($conexion);
  }

}
?>
