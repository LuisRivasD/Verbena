<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Questrial" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="img/verbena.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Verbena de la buena</title>
  </head>
  <body>
    <?php
    // include("header.html");
    include_once 'includes/header.php';
    ?>

    <div class="seccion_1">
      <div class="seccion_1Fondo">
        <div class="seccion_1Marco">
          <img src="img/tituloverbena_.svg" alt="">
          <p>¡BARRIGA LLENA <i class="fas fa-heart"></i> CONTENTO!</p>
        </div>

        <div class="seccion_1News">
            <i class="fas fa-newspaper"></i>
            <div class="dataNews">
              <p>NEWSLETTER</p>
              <a href="#newsletter">SUSCRIBIRSE</a>
            </div>
        </div>

      </div>
    </div>

    <div class="seccion_2">
      <div class="galeria">
        <!-- <img src="img/img_presentacion.jpg" alt="" class="presentacion"> -->
        <div class="general">

          <div class="infografia">
            <img src="img/info.svg" alt="">
          </div>

        </div>
      </div>
    </div>

    <div class="seccion_3">

      <div class="headImg">
        <p>GALERIA</p>
      </div>

      <div class="contenedorImg">

        <div class="imgInsta">
          <?php

          include 'modelo/sget_galeria.php';
          $img = new galeria();
          $img->insertaimagen();

          ?>

        </div>

      </div>
      </div>

    <div class="google-maps">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60412.89663238948!2d-97.09934193492258!3d18.851290138151015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c502a4c0439f05%3A0xd83faa836b275780!2sOrizaba%2C+Ver.!5e0!3m2!1ses-419!2smx!4v1523123596789" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>


      <?php
      // include("footer.html");
      include_once 'includes/footer.php';
      ?>


  </body>
</html>
