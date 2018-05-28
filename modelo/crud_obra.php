<?php

include_once 'sget_obras.php';
$d_obras = new obras();

$d_obras->setnombre(isset ($_POST["txtnombreobra"]) ? $_POST["txtnombreobra"] : "");
$d_obras->setartista(isset ($_POST["txtartista"]) ? $_POST["txtartista"] : "");
$d_obras->setcategoria(isset($_POST["txtcategoria"]) ? $_POST["txtcategoria"] : "");
$d_obras->setprecio(isset($_POST["txtprecio"]) ? $_POST["txtprecio"] : "");
$d_obras->setdescripcion(isset($_POST["txtdescripcion"]) ? $_POST["txtdescripcion"] : "");

session_start();
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion ="si";
  if(isset($_POST["txtope_crud"]) && !empty($_POST["txtope_crud"])){
    $clv_operacion = $_POST["txtope_crud"];
    // echo "clave_crud: ".$clv_operacion;

    if ($clv_operacion == "g") {
      try {
        registroobra();
      } catch (Exception $e){

      }
    }else{
      if ($clv_operacion == "m"){
      try {
        modificaobra();
      } catch (Exception $e){

      }
      }else{
        if ($clv_operacion == "e"){
          try {
            eliminaobra();
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



function registroobra(){

  include '../basedatos/conexion.php';
  global $d_obras;
  global $sesion;

  $result=pg_query($conexion, 'select max (id_obra) from obra');
  while ($dato = pg_fetch_array($result)) {
    $max_id = $dato['max'];
  }
  $autogenera_id = $max_id +1;

  $d_obras->setid($autogenera_id);

  $insert=pg_query($conexion,
  "insert into obra
  values (".$d_obras->getid().",'"
           .$d_obras->getnombre()."','"
           .$d_obras->getartista()."','"
           .$d_obras->getcategoria()."','"
           .$d_obras->getdescripcion()."','"
           .$d_obras->getprecio()."')");

pg_close($conexion);

if ($sesion == "si") {
  ?>
  <script type="text/javascript">
    alert('EL REGISTRO SE HA REALIZADO CON EXITO.');
    window.location="../tabla_obras.php";
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

function modificaobra(){
  global $d_obras;
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $modifica_id = $_POST["txtid_crud"];
    pg_query($conexion,"update obra
                        set nombre = '".$d_obras->getnombre()."',
                         artista = '".$d_obras->getartista()."',
                         categoria = '".$d_obras->getcategoria()."',
                         descripcion = '".$d_obras->getdescripcion()."',
                         precio = '".$d_obras->getprecio()."'

                         where id_obra = ".$modifica_id);
    pg_close($conexion);
    ?>

    <script type="text/javascript">
    alert('LA OBRA CON ID: <?php echo $modifica_id ?> HA SIDO MODIFICADA.');
    window.location="../tabla_obras.php";
   </script>
    <?php
  }else{
    // echo "algo salio mal";
  }

}

function eliminaobra(){
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $delete_id = $_POST["txtid_crud"];
    pg_query($conexion,"delete from obra where id_obra =". $delete_id);
    pg_close($conexion);
    ?>
    <script type="text/javascript">
    alert('LA OBRA CON ID: <?php echo $delete_id ?> HA SIDO ELIMINADA.');
    window.location="../tabla_obras.php";
  </script>
    <?php
  }

}

?>
