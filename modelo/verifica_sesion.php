<?php

if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
  $sesion_user=$_SESSION["usuario"];
  $username=$_SESSION["nombre"];
  if ($sesion_user=="administrador") {
    include_once 'includes/aside_admin.php';
  }else{
    if ($sesion_user=="colaborador"){
      include_once 'includes/aside_colaborador.php';
    }else{
      if ($sesion_user=="cliente"){
        include_once 'includes/aside_cliente.php';
      }
    }
  }
}else{
  header("Location: login.php");
  exit();
}
?>
