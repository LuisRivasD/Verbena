<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <header>

      <nav class="navbar-dark navbar-expand-md">

        <ul class="menu_ul">

          <li><a class="verbena">VERBENA DE LA BUENA<button id="btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button></a></li>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="navbar-nav mr-auto">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="cartelera.php">Cartelera</a></li>
              <li><a href="resena.php">Resena</a></li>
              <li><a href="rutas.php">Rutas</a></li>
              <li><a href="tienda.php">Tienda</a></li>
            </div>

            <?php
            session_start();
            $ruta="";
            $carrito="";
            if (!empty($_SESSION["usuario"])) {
              $ruta ="inicio.php";
            } else {
              $ruta = "login.php";
            }
             ?>

          <div class="d-flex flex-row justify-content-center hover" id="btn_icon">
            <a href="carrito.php" class="mr-1">
              <img src="img/carrito.svg" width="45" height="45" class="d-inline-block align-top"></a>

            <a href="<?php echo $ruta ?>" class="ml-2" id="user_r">
              <img src="img/usuario.svg" width="45" height="45" class="d-inline-block align-top"></a>
          </div>

        </div>
        </ul>


      </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  </body>
</html>
