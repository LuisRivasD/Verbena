<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/carrito.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Carrito</title>
  </head>
  <body>


      <?php
       include_once("includes/header.php");
       if (!empty($_SESSION["usuario"])) {
         //aquí incluir la vista cuando si haya sesión
         echo "aqui te apareceran cositas chidas";
       }else{
         //aquí incluir un login con diseno de carrito
         echo "inicia sesión";
       }
      ?>

      <!-- <h1>En construcción</h1> -->

      <?php
      include_once("includes/footer.php");
      ?>


  </body>
</html>
