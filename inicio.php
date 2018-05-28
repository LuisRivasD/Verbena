<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/inicio.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Administrador</title>
  </head>
  <body>
    <?php


    ?>

    <?php
    // $nomuser=isset($_REQUEST["Usuario"]) ? $_REQUEST["Usuario"]: "NO USER";
    session_start();
    include 'modelo/verifica_sesion.php';
    ?>

      <div class="fondo_inicio">
        <div class="contendedor">
          <!-- <h2>Bienvenido</h2> -->
          <h1 class="nombreuser"> <?php echo $username ?></h1>
          <!-- <h2>VERBENA DE LA BUENA</h2> -->
        </div>
      </div>


  </body>
</html>
