<?php

$email = (isset ($_POST["txthtmlinsta"]) ? $_POST["txthtmlinsta"] : "no llega nada");

// agregaemail();

session_start();
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion ="si";
    if(isset($_POST["txtope"]) && !empty($_POST["txtope"])){
      $clv_operacion = $_POST["txtope"];
      if ($clv_operacion=="g") {
        verifica();
      }else{
        if ($clv_operacion=="m") {
          verifica();
        }else {
          if ($clv_operacion=="e") {
            eliminafoto();
          }
        }
      }

  }else{
    verifica();
  }
}else{
  $sesion ="no";
}
//
// if ($sesion=="no") {
//   verifica();
// }

function eliminafoto(){
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid"]) && !empty($_POST["txtid"])) {
    $delete_id = $_POST["txtid"];
    pg_query($conexion,"delete from galeria where id_imagen =". $delete_id);
    pg_close($conexion);
    ?>
    <script type="text/javascript">
    alert('LA IMAGEN CON ID: <?php echo $delete_id ?> HA SIDO ELIMINADA.');
    window.location="../tabla_evento.php#newsdiv";
  </script>
    <?php
  }else{
    ?>
    <script type="text/javascript">
    alert('SELECCIONE UN URL DE LA TABLA ADJUNTA');
    window.location="../tabla_evento.php#newsdiv";
  </script>
    <?php
  }

}

function verifica(){
  global $clv_operacion;
  global $email;
  include '../basedatos/conexion.php';
  $result=pg_query($conexion, "select html_instagram from galeria where html_instagram = '". $email."'");
  while ($dato = pg_fetch_array($result)) {
    $auxemail = $dato['html_instagram'];
  }
  if (empty($auxemail)) {
    if ($clv_operacion=="m") {
      modicaemail();
    }else{
      if ($clv_operacion=="g") {
        agregaemail();
      }
    }
  }else{
    ?>
    <script type="text/javascript">
    alert('EL TAG HTML: <?php echo substr(htmlentities($email),0,120); ?> YA HA SIDO REGISTRADO, PRUEBE CON OTRO.');
    window.location="../tabla_evento.php#newsdiv";
  </script>
    <?php
  }
}

function modicaemail(){
  global $email;
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid"]) && !empty($_POST["txtid"])) {
    $modifica_id = $_POST["txtid"];
    pg_query($conexion,"update galeria
                              set html_instagram = '".$email."'

                              where id_imagen =". $modifica_id);
    pg_close($conexion);
    ?>

    <script type="text/javascript">
    alert('LA IMAGEN CON ID: <?php echo $modifica_id ?> HA SIDO MODIFICADA.');
    window.location="../tabla_evento.php#newsdiv";
  </script>
    <?php
  }
}

function agregaemail(){
  global $email;
  global $sesion;
  include '../basedatos/conexion.php';
  $result=pg_query($conexion, 'select max (id_imagen) from galeria');
  while ($dato = pg_fetch_array($result)) {
    $max_id = $dato['max'];
  }
  $autogenera_id = $max_id +1;


  $insert=pg_query($conexion,
  "insert into galeria
  values (".$autogenera_id.",'".$email."')");
  pg_close($conexion);

?>
<script type="text/javascript">
  alert('EL REGISTRO DE LA IMAGEN SE HA REALIZADO CON EXITO.');
  <?php
  if ($sesion=="no") {
    ?>
    window.history.back();
    <?php
  }else {
    ?>
    window.location="../tabla_evento.php#newsdiv";
    <?php
  }
  ?>
</script>

<?php
}
?>
