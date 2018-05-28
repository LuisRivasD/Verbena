<?php
include 'usuario.php';
session_start();
$sesion_user = new usuario();
if (isset($_POST["txtuser"]) && !empty($_POST["txtuser"]) &&
    isset($_POST["txtpass"]) && !empty($_POST["txtpass"])) {
  $usuario=$_POST["txtuser"];
  $contrasena=$_POST["txtpass"];
  $sesion_user->setuser($usuario);
  $sesion_user->setpass($contrasena);
  try {
    $sesion_user->buscaadmin();
    if ($contrasena==$sesion_user->getpass_c()) {
      $_SESSION["usuario"]="administrador";
      $_SESSION["nombre"]=$usuario;
      header('Location: ../inicio.php?usuario='.$sesion_user->getuser());
    }else{
      $sesion_user->buscacolaborador();
      if ($contrasena==$sesion_user->getpass_c()) {
        $_SESSION["usuario"]="colaborador";
        $_SESSION["nombre"]=$usuario;
        header('Location: ../inicio.php?usuario='.$sesion_user->getuser());
      }else{
        $sesion_user->buscacliente();
        if ($contrasena==$sesion_user->getpass_c()) {
          $_SESSION["usuario"]="cliente";
          $_SESSION["nombre"]=$usuario;
          header('Location: ../inicio.php?usuario='.$sesion_user->getuser());
        }else{
          ?>
          <script type="text/javascript">
          alert('VERIFIQUE CREDENCIALES O EL USUARIO NO EXISTE.');
          window.location="../login.php";
        </script>
          <?php
        }
      }
    }

  } catch (Exception $e) {

  }
}

?>
