<?php

include_once 'sget_evento.php';
$d_evento = new evento();
//$conversion =isset($_POST['op']) ? $_POST['op'] : "No hay sistema";
$d_evento->setnombre(isset ($_POST["txtnombreevento"]) ? $_POST["txtnombreevento"] : "");
$d_evento->setdireccion(isset ($_POST["txtdireccion"]) ? $_POST["txtdireccion"] : "");
$d_evento->setorganizador(isset($_POST["txtorganizador"]) ? $_POST["txtorganizador"] : "");
$d_evento->setfecha(isset($_POST["txtfecha"]) ? $_POST["txtfecha"] : "");
$d_evento->sethrinicio(isset($_POST["txthrinicio"]) ? $_POST["txthrinicio"] : "");
$d_evento->sethrfin(isset($_POST["txthrfin"]) ? $_POST["txthrfin"] : "");
$d_evento->setcategoria(isset($_POST["txtcategoria"]) ? $_POST["txtcategoria"] : "");
$d_evento->setclasificacion(isset($_POST["txtclasificación"]) ? $_POST["txtclasificación"] : "");
$d_evento->setdescripcion(isset($_POST["txtdescripcion"]) ? $_POST["txtdescripcion"] : "");

session_start();
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion ="si";
  if(isset($_POST["txtope_crud"]) && !empty($_POST["txtope_crud"])){
    $clv_operacion = $_POST["txtope_crud"];
    // echo "clave_crud: ".$clv_operacion;

    if ($clv_operacion == "g") {
      try {
        registroevento();
      } catch (Exception $e){

      }
    }else{
      if ($clv_operacion == "m"){
      try {
        modificaevento();
      } catch (Exception $e){

      }
      }else{
        if ($clv_operacion == "e"){
          try {
            eliminaevento();
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



function registroevento(){

  include '../basedatos/conexion.php';
  global $d_evento;
  global $sesion;

  $result=pg_query($conexion, 'select max (id_evento) from evento');
  while ($dato = pg_fetch_array($result)) {
    $max_id = $dato['max'];
  }
  $autogenera_id = $max_id +1;

  $d_evento->setid($autogenera_id);

  $insert=pg_query($conexion,
  "insert into evento
  values (".$d_evento->getid().",'"
           .$d_evento->getnombre()."','"
           .$d_evento->getdireccion()."','"
           .$d_evento->getfecha()."','"
           .$d_evento->gethrinicio()."','"
           .$d_evento->gethrfin()."','"
           .$d_evento->getorganizador()."','"
           .$d_evento->getclasificacion()."','"
           .$d_evento->getcategoria()."','"
           .$d_evento->getdescripcion()."')");

pg_close($conexion);

if ($sesion == "si") {
  ?>
  <script type="text/javascript">
    alert('EL REGISTRO SE HA REALIZADO CON EXITO.');
    window.location="../tabla_evento.php";
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

function modificaevento(){
  global $d_evento;
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $modifica_id = $_POST["txtid_crud"];
    pg_query($conexion,"update evento
                        set nombre = '".$d_evento->getnombre()."',
                         direccion = '".$d_evento->getdireccion()."',
                         fecha = '".$d_evento->getfecha()."',
                         hora_inicio = '".$d_evento->gethrinicio()."',
                         hora_fin = '".$d_evento->gethrfin()."',
                         organizador = '".$d_evento->getorganizador()."',
                         clasificacion = '".$d_evento->getclasificacion()."',
                         categoria = '".$d_evento->getcategoria()."',
                         descripcion = '".$d_evento->getdescripcion()."'

                         where id_evento = ".$modifica_id);
    pg_close($conexion);
    ?>

    <script type="text/javascript">
    alert('EL EVENTO CON ID: <?php echo $modifica_id ?> HA SIDO MODIFICADO.');
    window.location="../tabla_evento.php";
   </script>
    <?php
  }else{
    // echo "algo salio mal";
  }

}

function eliminaevento(){
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $delete_id = $_POST["txtid_crud"];
    pg_query($conexion,"delete from evento where id_evento =". $delete_id);
    pg_close($conexion);
    ?>
    <script type="text/javascript">
    alert('EL EVENTO CON ID: <?php echo $delete_id ?> HA SIDO ELIMINADO.');
    window.location="../tabla_evento.php";
  </script>
    <?php
  }

}

?>
