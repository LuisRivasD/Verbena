<?php

include_once 'sget_resena.php';
$d_resena = new resena();
date_default_timezone_set('America/Mexico_City');

$d_resena->settitulo(isset ($_POST["txttitulo"]) ? $_POST["txttitulo"] : "");
// $d_resena->setautor(isset ($_POST["txtusername"]) ? $_POST["txtusername"] : "");
$d_resena->setfechapub(date("d-m-Y"));
$d_resena->sethorapub(date("H:i:s"));
$d_resena->setcontenido(isset ($_POST["txtcontenido"]) ? $_POST["txtcontenido"] : "");


session_start();
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion ="si";
  if(isset($_POST["txtope_crud"]) && !empty($_POST["txtope_crud"])){
    $clv_operacion = $_POST["txtope_crud"];
    // echo "clave_crud: ".$clv_operacion;

    if ($clv_operacion == "g") {
      try {
        registroresena();
      } catch (Exception $e){

      }
    }else{
      if ($clv_operacion == "m"){
      try {
        modificaresena();
      } catch (Exception $e){

      }
      }else{
        if ($clv_operacion == "e"){
          try {
            eliminaresena();
          } catch (Exception $e){

          }
        }
      }
    }
  }

}else{
  $sesion="no";
  try {
    ?>
    <script type="text/javascript">
      alert('LO SENTIMOS USTED, NO ESTA AUTORIZADO EN ESTE APARTADO NEL.');
      window.location="../index.php";
    </script>
    <?php
  } catch (Exception $e) {

  }

}

function capturanombre(){
  global $d_resena;
  include 'sget_persona.php';
  $objUserName = new persona();
  $usuariologin = isset ($_POST["txtusername"]) ? $_POST["txtusername"] : "";
  $tipousuario = isset ($_POST["tipousuario"]) ? $_POST["tipousuario"] : "";
  include '../basedatos/conexion.php';
  $result=pg_query($conexion, "select nombre, ap_paterno, ap_paterno, ap_materno from " . $tipousuario. " where usuario = '". $usuariologin."'");
  while ($dato = pg_fetch_array($result)){
    $objUserName->setnombre($dato['nombre']);
    $objUserName->setpaterno($dato['ap_paterno']);
    $objUserName->setmaterno($dato['ap_materno']);
    $d_resena->setautor($objUserName->getNombreCompleto());
  }
  pg_close($conexion);
}

function registroresena(){
  capturanombre();
  include '../basedatos/conexion.php';
  global $d_resena;
  global $sesion;

  $result=pg_query($conexion, 'select max (id_resena) from resena');
  while ($dato = pg_fetch_array($result)) {
    $max_id = $dato['max'];
  }
  $autogenera_id = $max_id +1;

  $d_resena->setid($autogenera_id);

  $insert=pg_query($conexion,
  "insert into resena
  values (".$d_resena->getid().",'"
           .$d_resena->gettitulo()."','"
           .$d_resena->getautor()."','"
           .$d_resena->getfechapub()."','"
           .$d_resena->gethorapub()."','"
           .$d_resena->getcontenido()."')");

pg_close($conexion);

if ($sesion == "si") {
  ?>
  <script type="text/javascript">
    alert('EL REGISTRO SE HA REALIZADO CON EXITO.');
    window.location="../tabla_resena.php";
  </script>

  <?php
}else{

  ?>

  <script type="text/javascript">
  alert('ALGO SALIO MAL.');
  window.location="../login.php";
</script>

<?php
}

 }

function modificaresena(){
  capturanombre();
  global $d_resena;
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $modifica_id = $_POST["txtid_crud"];
    pg_query($conexion,"update resena
                        set titulo = '".$d_resena->gettitulo()."',
                         autor = '".$d_resena->getautor()."',
                         fecha_pub = '".$d_resena->getfechapub()."',
                         hora = '".$d_resena->gethorapub()."',
                         descripcion = '".$d_resena->getcontenido()."'

                         where id_resena = ".$modifica_id);
    pg_close($conexion);
    ?>

    <script type="text/javascript">
    alert('LA RESEnA CON ID: <?php echo $modifica_id ?> HA SIDO MODIFICADA.');
    window.location="../tabla_resena.php";
   </script>
    <?php
  }

}

function eliminaresena(){
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $delete_id = $_POST["txtid_crud"];
    pg_query($conexion,"delete from resena where id_resena =". $delete_id);
    pg_close($conexion);
    ?>
    <script type="text/javascript">
    alert('LA RESEnA CON ID: <?php echo $delete_id ?> HA SIDO ELIMINADA.');
    window.location="../tabla_resena.php";
  </script>
    <?php
  }

}

?>
