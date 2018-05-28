<?php

include_once 'sget_persona.php';
$d_user = new persona();
//$conversion =isset($_POST['op']) ? $_POST['op'] : "No hay sistema";
$d_user->setusuario(isset ($_POST["txtusername"]) ? $_POST["txtusername"] : "");
$d_user->setcontrasena(isset ($_POST["txtpass"]) ? $_POST["txtpass"] : "");
$d_user->setnombre(isset($_POST["txtnombre"]) ? $_POST["txtnombre"] : "");
$d_user->setpaterno(isset($_POST["txtapp"]) ? $_POST["txtapp"] : "");
$d_user->setmaterno(isset($_POST["txtapm"]) ? $_POST["txtapm"] : "");
$d_user->setemail(isset($_POST["txtemail"]) ? $_POST["txtemail"] : "");
$d_user->setdireccion(isset($_POST["txtdireccion"]) ? $_POST["txtdireccion"] : "");
$d_user->settelefono(isset($_POST["txttelefono"]) ? $_POST["txttelefono"] : "");

session_start();
if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion ="si";
  if(isset($_POST["txtope_crud"]) && !empty($_POST["txtope_crud"])){
    $clv_operacion = $_POST["txtope_crud"];
    // echo "clave_crud: ".$clv_operacion;

    if ($clv_operacion == "g") {
      try {
        verificausuario();
      } catch (Exception $e){

      }
    }else{
      if ($clv_operacion == "m"){
      // echo "Modificar";
      try {
        modificausuario();
      } catch (Exception $e){

      }
      }else{
        if ($clv_operacion == "e"){
          // echo "Eliminar";
          try {
            eliminausuario();
          } catch (Exception $e){

          }
        }
      }
    }
  }

}else{
  $sesion="no";
  try {
    verificausuario();
  } catch (Exception $e) {

  }

}


function verificausuario(){
  include '../basedatos/conexion.php';
  global $d_user;
  global $sesion;
    $result=pg_query($conexion, "select id_usuario from usuario where usuario ='".$d_user->getusuario()."'");
    while ($dato = pg_fetch_array($result)) {
       $id_user = $dato['id_usuario'];
     }
     if (empty($id_user)) {
       if ($sesion == "si") {
         registrocliente();
       }else{
         compruebacontrasena();
       }
     }else{

       if ($sesion == "si") {
         try {
           ?>
           <script type="text/javascript">
           alert('EL USUARIO YA EXISTE, INGRESA UNO NUEVO.');
         window.location="../cliente.php";
           </script> -->
           <?php
         } catch (Exception $e) {

         }

       }else{
         ?>
         <script type="text/javascript">
         alert('EL USUARIO YA EXISTE, INGRESA UNO NUEVO.');
         window.location="../registro_cliente.php";
         </script> -->
         <?php
       }
     }
}

function compruebacontrasena(){
  global $d_user;
  $d_user->setconfirmcontrasena($_POST["txtpass_confirm"]);
  if($d_user->getcontrasena() != $d_user->getconfirmcontrasena()){
    ?>
    <script type="text/javascript">
    alert('LAS CONTRASEnAS NO COINCIDEN.');
    window.location="../registro_cliente.php";
    </script>
    <?php
  }else{
    registrocliente();
  }
}

function registrocliente(){

  include '../basedatos/conexion.php';
  global $d_user;
  global $sesion;

  $result=pg_query($conexion, 'select max (id_usuario) from usuario');
  while ($dato = pg_fetch_array($result)) {
    $max_id = $dato['max'];
  }
  $autogenera_id = $max_id +1;

  $d_user->setid($autogenera_id);

  $insert=pg_query($conexion,
  "insert into usuario
  values (".$d_user->getid().",'"
           .$d_user->getusuario()."','"
           .$d_user->getcontrasena()."','"
           .$d_user->getnombre()."','"
           .$d_user->getpaterno()."','"
           .$d_user->getmaterno()."','"
           .$d_user->getemail()."','"
           .$d_user->getdireccion()."','"
           .$d_user->gettelefono()."')");

pg_close($conexion);

if ($sesion == "si") {
  ?>
  <script type="text/javascript">
    alert('EL REGISTRO SE HA REALIZADO CON EXITO.');
    window.location="../tabla_cliente.php";
  </script>

  <?php
}else{

  ?>

  <script type="text/javascript">
  alert('EL REGISTRO SE HA REALIZADO CON EXITO, SERA REDIRIGIDO AL INICIO SE SESIÓN E INGRESE CON SUS CREDENCIALES.');
  window.location="../login.php";
</script>

<?php
}

 }

function modificausuario(){
  global $d_user;
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $modifica_id = $_POST["txtid_crud"];
    pg_query($conexion,"update usuario
                        set usuario = '".$d_user->getusuario()."',
                         contrasena = '".$d_user->getcontrasena()."',
                         nombre = '".$d_user->getnombre()."',
                         ap_paterno = '".$d_user->getpaterno()."',
                         ap_materno = '".$d_user->getmaterno()."',
                         email = '".$d_user->getemail()."',
                         direccion = '".$d_user->getdireccion()."',
                         telefono = '".$d_user->gettelefono()."'

                         where id_usuario = ".$modifica_id);
    pg_close($conexion);
    ?>

    <script type="text/javascript">
    alert('EL USUARIO CON ID: <?php echo $modifica_id ?> HA SIDO MODIFICADO.');
    // window.location="../tabla_cliente.php";
    <?php
    if ($_SESSION["usuario"]=="cliente") {
      ?>
      window.location="../form_cliente.php";
      <?php
    }else{
      ?>
      window.location="../tabla_cliente.php";
      <?php
    }
    ?>
   </script>
    <?php
  }

}

function eliminausuario(){
  include '../basedatos/conexion.php';
  if (isset($_POST["txtid_crud"]) && !empty($_POST["txtid_crud"])) {
    $delete_id = $_POST["txtid_crud"];
    pg_query($conexion,"delete from usuario where id_usuario =". $delete_id);
    pg_close($conexion);
    ?>
    <script type="text/javascript">
    alert('EL USUARIO CON ID: <?php echo $delete_id ?> HA SIDO ELIMINADO.');
    window.location="../tabla_cliente.php";
  </script>
    <?php
  }

}

?>
