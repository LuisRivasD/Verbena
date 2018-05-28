<?php

include_once 'sget_ruta.php';
$d_ruta = new rutas();
//$conversion =isset($_POST['op']) ? $_POST['op'] : "No hay sistema";
$d_ruta->setnombre(isset ($_POST["txtnombreruta"]) ? $_POST["txtnombreruta"] : "");
$d_ruta->setcp(isset ($_POST["txtpostal"]) ? $_POST["txtpostal"] : "");
$d_ruta->setcalle(isset($_POST["txtcalle"]) ? $_POST["txtcalle"] : "");
$d_ruta->setcolonia(isset($_POST["txtcolonia"]) ? $_POST["txtcolonia"] : "");
$d_ruta->setciudad(isset($_POST["txtciudad"]) ? $_POST["txtciudad"] : "");
$d_ruta->setnumext(isset($_POST["txtext"]) ? $_POST["txtext"] : "");
$d_ruta->setnumint(isset($_POST["txtint"]) ? $_POST["txtint"] : "");
$d_ruta->setcoordenadas(isset($_POST["txtmaps"]) ? $_POST["txtmaps"] : "");
session_start();
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion ="si";
  if(isset($_POST["txtope_crud"]) && !empty($_POST["txtope_crud"])){
    $clv_operacion = $_POST["txtope_crud"];
    // echo "clave_crud: ".$clv_operacion;

    if ($clv_operacion == "g") {
      try {
        registroruta();
      } catch (Exception $e){

      }
    }else{
      if ($clv_operacion == "m"){
      try {
        modificaruta();
      } catch (Exception $e){

      }
      }else{
        if ($clv_operacion == "e"){
          try {
            eliminaruta();
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
      alert('LO SENTIMOS USTED, NO ESTA AUTORIZADO EN ESTE APARTADO.');
      window.location="../index.php";
    </script>
    <?php
  } catch (Exception $e) {

  }

}



function registroruta(){

  include '../basedatos/conexion.php';
  global $d_ruta;
  global $sesion;

  $result=pg_query($conexion, 'select max (id_ruta) from ruta');
  while ($dato = pg_fetch_array($result)) {
    $max_id = $dato['max'];
  }
  $autogenera_id = $max_id +1;

  $d_ruta->setid($autogenera_id);

  $insert=pg_query($conexion,
  "insert into ruta
  values (".$d_ruta->getid().",'"
           .$d_ruta->getnombre()."','"
           .$d_ruta->getcalle()."','"
           .$d_ruta->getcp()."','"
           .$d_ruta->getcolonia()."','"
           .$d_ruta->getciudad()."','"
           .$d_ruta->getnumext()."','"
           .$d_ruta->getnumint()."','"
           .$d_ruta->getcoordenadas()."')");

pg_close($conexion);

if ($sesion == "si") {
  ?>
  <script type="text/javascript">
    alert('EL REGISTRO SE HA REALIZADO CON EXITO.');
    window.location="../tabla_rutas.php";
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

function modificaruta(){
  global $d_ruta;
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $modifica_id = $_POST["txtid_crud"];
    pg_query($conexion,"update ruta
                        set nombre = '".$d_ruta->getnombre()."',
                         calle = '".$d_ruta->getcalle()."',
                         cp = '".$d_ruta->getcp()."',
                         colonia = '".$d_ruta->getcolonia()."',
                         ciudad = '".$d_ruta->getciudad()."',
                         num_ext = '".$d_ruta->getnumext()."',
                         num_int = '".$d_ruta->getnumint()."',
                         coordenadas = '".$d_ruta->getcoordenadas()."'

                         where id_ruta = ".$modifica_id);
    pg_close($conexion);
    ?>

    <script type="text/javascript">
    alert('LA RUTA CON ID: <?php echo $modifica_id ?> HA SIDO MODIFICADA.');
    window.location="../tabla_rutas.php";
   </script>
    <?php
  }

}

function eliminaruta(){
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $delete_id = $_POST["txtid_crud"];
    pg_query($conexion,"delete from ruta where id_ruta =". $delete_id);
    pg_close($conexion);
    ?>
    <script type="text/javascript">
    alert('LA RUTA CON ID: <?php echo $delete_id ?> HA SIDO ELIMINADA.');
    window.location="../tabla_rutas.php";
  </script>
    <?php
  }

}

?>
