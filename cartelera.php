<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/cartelera.css">
    <link rel="icon" href="img/verbena.ico">
    <script src="js/main.js" charset="utf-8"></script>
    <title>Cartelera - Verbena de la buena</title>
  </head>
  <body>

    <?php
    include_once("includes/header.php");
    ?>


    <div class="slide_carrusel">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 100vh">
            <img class="d-block w-100" src="img/img_verbena4.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <img src="img/cartelera.svg" alt="" class="imgCartelera">
              <p> Sabemos que en nuestra región pasan muchas cosas bonitas por lo que es difícil seguirles la pista, así que ven y
                descubre nuestra humilde cartelera. Surge como propuesta para que andes siempre enterado y no te vuelvas a perder
                cualquiera que sea tu tipo de evento, aquí encontrarás T-O-D-O-S.
                Somos una comunidad en constante comunicación para no perder ni un detalle.</p>
            </div>
          </div>
          <div class="carousel-item" style="height: 100vh">
            <img class="d-block w-100" src="img/img_verbena12.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h1>HIERBAS DE MARZO</h1>
              <p> Es la bonita costumbre que les venimos manejando, esto no es sobre religión es más bien de acercarnos a la verbena de la calle.
                En los atrios puedes encontrar pan de feria, de burro, nieves, gorditas de nata... </p>
            </div>
          </div>
          <div class="carousel-item" style="height: 100vh">
            <img class="d-block w-100" src="img/img_verbena13.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h1>JUEVES DE ATRIOS</h1>
              <p> Es la bonita costumbre que les venimos manejando, esto no es sobre religión es más bien de acercarnos a la verbena de la calle.
                En los atrios puedes encontrar pan de feria, de burro, nieves, gorditas de nata... </p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

    <div class="seccion_5">
      <div class="headEvento">
        <p><?php setlocale(LC_ALL,"es_ES"); echo strtoupper(strftime("%B"));?></p>
      </div>

      <div class="contenedorEvento">

        <div class="cajaEvento">
          <?php
          include 'modelo/sget_evento.php';
          $evento = new evento();
          $evento->insertaevento();
          ?>
      </div>
    </div>
    </div>

    <?php
    include_once("includes/footer.php");
    ?>

  </body>
</html>
