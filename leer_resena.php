<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/resena.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Resenas</title>
  </head>
  <body>

      <?php
       include_once 'includes/header.php';
       include 'modelo/sget_resena.php';
       $leeResena = new resena();
      ?>


      <div class="fondo_resena">
        <div class="espacio">

        </div>
        <section class="seccion_resena">
          <div class="contenido_resena">
            <?php
            $id = $_GET['id'];
            echo $leeResena->leer($id); ?>
          </div>
        </section>


      </div>

      <?php
      include 'includes/footer.php';
      ?>


  </body>
</html>
