<?php

class evento{
  protected $identificador="";
  protected $nombre="";
  protected $direccion="";
  protected $fecha="";
	protected $hr_inicio="";
	protected $hr_fin="";
	protected $organizador="";
  protected $clasificacion="Clasificación";
  protected $categoria="Categoría";
  protected $descripcion="";

  function setid($pidentificador){
    $this->identificador = $pidentificador;
  }

  function getid(){
    return $this->identificador;
  }

  function setnombre($pnombre){
    $this->nombre = $pnombre;
  }

  function getnombre(){
    return $this->nombre;
  }

  function setdireccion($pdireccion){
    $this->direccion = $pdireccion;
  }

  function getdireccion(){
    return $this->direccion;
  }

  function setfecha($pfecha){
    $this->fecha = $pfecha;
  }

  function getfecha(){
    return $this->fecha;
  }

  function sethrinicio($phr_inicio){
    $this->hr_inicio = $phr_inicio;
  }

  function gethrinicio(){
    return $this->hr_inicio;
  }


  function sethrfin($phr_fin){
    $this->hr_fin = $phr_fin;
  }

  function gethrfin(){
    return $this->hr_fin;
  }


  function setorganizador($porganizador){
    $this->organizador = $porganizador;
  }

  function getorganizador(){
    return $this->organizador;
  }

  function setclasificacion($pclasificacion){
    $this->clasificacion = $pclasificacion;
  }

  function getclasificacion(){
    return $this->clasificacion;
  }

  function setcategoria($pcategoria){
    $this->categoria = $pcategoria;
  }

  function getcategoria(){
    return $this->categoria;
  }

  function setdescripcion($pdescripcion){
    $this->descripcion = $pdescripcion;
  }

  function getdescripcion(){
    return $this->descripcion;
  }

  function gettiempo(){
    return $this->hr_inicio." - ".$this->hr_fin;
  }

  function tablaevento($id_ope){
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, 'select * from evento where id_evento ='.$id_ope);
    while ($dato = pg_fetch_array($result)){

      $this->setid($dato['id_evento']);
      $this->setnombre($dato['nombre']);
      $this->setdireccion($dato['direccion']);
      $this->setfecha($dato['fecha']);
      $this->sethrinicio($dato['hora_inicio']);
      $this->sethrfin($dato['hora_fin']);
      $this->setorganizador($dato['organizador']);
      $this->setclasificacion($dato['clasificacion']);
      $this->setcategoria($dato['categoria']);
      $this->setdescripcion($dato['descripcion']);
    }
    pg_close($conexion);
  }

  function insertaevento(){
    setlocale(LC_ALL,"es_ES");
    include 'basedatos/conexion.php';
    $result=pg_query($conexion, "select * from evento where fecha between '".date("Y-m-01")."' and '".date("Y-m-31")."' order by fecha asc;");
    while ($dato = pg_fetch_array($result)){

      $this->setid($dato['id_evento']);
      $this->setnombre($dato['nombre']);
      $this->setdireccion($dato['direccion']);
      $this->setfecha($dato['fecha']);
      $this->sethrinicio($dato['hora_inicio']);
      $this->sethrfin($dato['hora_fin']);
      $this->setorganizador($dato['organizador']);
      $this->setclasificacion($dato['clasificacion']);
      $this->setcategoria($dato['categoria']);
      $this->setdescripcion($dato['descripcion']);
      ?>
      <div class="itemsEvento">

        <div class="fechaCaja">
          <div class="barras"></div>
          <dl>
            <dt><?php echo strtoupper(strftime("%B"));?></dt>
            <dd><?php echo substr($this->getfecha(),8,9); ?></dd>
          </dl>
        </div>

        <div class="Evento">
          <strong class="tipoEvento"><?php echo strtoupper($this->getcategoria()); ?></strong>
          <p class="nombreEvento"><?php echo substr($this->getnombre(),0,17)."..."; ?></p>
          <p class="hora"><?php echo substr($this->gethrinicio(),0,5)."H - ".substr($this->gethrfin(),0,5)."H" ?></p>

          <span class="tooltiptext">
            <strong ><?php echo strtoupper($this->getnombre()); ?></strong><br>
            <strong>Organiza: </strong> <?php echo $this->getorganizador(); ?><br>
                <strong>Dirección: </strong> <?php echo $this->getdireccion(); ?><br>
                <strong>Público: </strong><?php echo $this->getclasificacion(); ?><br>
                <strong>Descripción: </strong> <?php echo $this->getdescripcion(); ?>
         </span>

        </div>
      </div>
      <?php
    }
    pg_close($conexion);
  }

}
?>
