<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/registrarse.css">
    <link rel="icon" href="img/verbena.ico">
    <script src="js/main.js" charset="utf-8"></script>
    <title>Inicio Sesión - Verbena de la buena</title>
  </head>
  <body>

    <?php
    include_once 'includes/header.php';
    ?>

    <div class="background-login">
      <div class="div_login">
        <div class="div_cristal">

          <div class="derecho">
            <h3>Registrate</h3>
            <img src="img/img_registro.svg" alt="" class="img_derecha">
          </div>

          <div class="izquierdo">
            <h3>Rellena estos campos</h3>
            <form name="" class="" action="modelo/crud_cliente.php" method="post">
              <div class="input_box">
                <input class="placeholder" type="text" id="idnombre" name="txtnombre" placeholder="Nombre (s)" value="" required>
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="text" name="txtapp" placeholder="Apellido Paterno" value="" required>
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="text" name="txtapm" placeholder="Apellido Materno" value="">
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="text" name="txtusername" placeholder="Usuario" value="" required>
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="password" name="txtpass" placeholder="Contrasena" value="" required>
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="password" name="txtpass_confirm" placeholder="Confirme Contrasena" value="" required>
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="email" name="txtemail" placeholder="Email" value="" required>
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" type="tel" name="txttelefono" placeholder="Tel&eacute;fono" value="">
              <!-- </div> -->

              <!-- <div class="input_box"> -->
                <input class="placeholder" id="dir" type="text" name="txtdireccion" placeholder="Direcci&oacute;n" value="">
              </div>

              <input type="submit" name="" value="Registrarse">
            </form>
          </div>

        </div>
      </div>
    </div>

    <?php
    include_once 'includes/footer.php';
    ?>

  </body>
</html>
