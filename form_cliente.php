<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/agrega_usuario.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Clientes</title>
  </head>
  <body>

      <?php
      session_start();
      include_once 'modelo/verifica_sesion.php';
      include 'modelo/sget_persona.php';
      $objCliente = new persona();
       ?>
      <div class="fondo_agrega_colaborador">
        <div class="contenedor_form_colaborador">
          <!-- <h3>AGREA UN EVENTO</h3> -->
          <div class="formulario">
            <?php
            try {
              $clv_ope= isset($_POST["txtope"]) ?  $_POST["txtope"] : "m";
              if($clv_ope == "m" || $clv_ope == "e"){
                $id_ope=isset($_POST["txtid"]) ? $_POST["txtid"] : $objCliente->consultaid($username);;
                $objCliente->tablaclientes($id_ope);
              }else{
              }

              if ($clv_ope == "e") {
                $editable="disabled";
              }else{
                $editable="";
              }
            } catch (Exception $e) {
            }

            if ($sesion_user=="cliente") {
              $edit ="disabled";
            }else{
              $edit="";
            }

             ?>
          <form name="cliente" class="" action="" method="post">

            <div class="input_box">
              <label class="label_uno" for="txtnombre"><i class="fas fa-user"></i></label>
              <input class="input_ancho" type="text" name="txtnombre" value="<?php echo $objCliente->getnombre(); ?>" placeholder="Nombre(s)" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_dos" for="txtapp"><i class="fas fa-id-card"></i></label>
              <input class="input_ancho" type="text" name="txtapp" value="<?php echo $objCliente->getpaterno(); ?>" placeholder="Apellido Paterno" <?php echo $editable ?>>
            <!-- </div>
            <div class="input_box"> -->
              <label class="label_tres" for="txtapm"><i class="fas fa-id-card"></i></label>
              <input class="input_ancho" type="text" name="txtapm" value="<?php echo $objCliente->getmaterno(); ?>" placeholder="Apellido Materno" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_cuatro" for="txtusername"><i class="fas fa-user-circle"></i></label>
              <input class="input_ancho" type="text" name="txtusername" value="<?php echo $objCliente->getusuario(); ?>" placeholder="Nombre de usuario" <?php echo $editable . $edit ?> >
            <!-- </div>
            <div class="input_box"> -->
              <label class="label_cinco" for="txtpass"><i class="fas fa-lock"></i></label>
              <input class="input_ancho" type="text" name="txtpass" value="<?php echo $objCliente->getcontrasena(); ?>" placeholder="Contrasena" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_seis" for="txtemail"><i class="fas fa-envelope"></i></label>
              <input class="input_ancho" type="email" name="txtemail" value="<?php echo $objCliente->getemail(); ?>" placeholder="Correo Electronico" <?php echo $editable ?>>
            <!-- </div>
            <div class="input_box"> -->
              <label class="label_siete" for="txttelefono"><i class="fas fa-phone"></i></label>
              <input class="input_ancho" type="text" name="txttelefono" value="<?php echo $objCliente->gettelefono(); ?>" maxlength="10" placeholder="Telefono" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_ocho" for="txtdireccion"><i class="fas fa-map-marker"></i></label>
              <input class="input_ancho" type="text" name="txtdireccion" value="<?php echo $objCliente->getdireccion(); ?>" placeholder="Dirección" <?php echo $editable ?>>
            </div>

            <input type="hidden" name="txtope_crud" value="<?php echo $clv_ope?>">
            <input type="hidden" name="txtid_crud" value="<?php echo $objCliente->getid(); ?>">

              <input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Listo" onClick="cliente.action='modelo/crud_cliente.php';">
              <input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Cancelar" onClick="cliente.action='tabla_cliente.php';">

            </form>
            </div>
        </div>
      </div>
  </body>
</html>
