<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <title></title>
  </head>
  <body>
    <footer>
      <div class="footer_receptaculo">
        <div class="footer_principal">
          <div class="foot_pilar">
            <!-- <h3>Contactanos</h3> -->
            <p class="ph3footer" >Contactanos</p>
            <p class="foot_label">Llamanos:  <span class="foot_span">+45 0208 1234 355</span></p>
            <p class="foot_label">Email:  <span class="foot_span">verbenadelabuena@gmail.com</span></p>
            <p class="foot_label">Algo m&aacute;s:  <span class="foot_span">Lorem Ipsum Dolor</span></p>
        </div>

        <div class="foot_pilar">
          <!-- <h3>Siguenos</h3> -->
          <p class="ph3footer" >Siguenos</p>
          <p class="foot_n">La Verbena es la mera buena, enterate de lo que hace a diario.</p>
          <a href="https://www.facebook.com/Verbenadelabuena/" target="_blank"><img src="img/facebook.svg" alt="" class="img_foot"></a>
          <a href="https://www.instagram.com/verbenadelabuena/" target="_blank"><img src="img/instagram.svg" alt="" class="img_foot"></a>
          <a href="#" target="_blank"><img src="img/twitter.svg" alt="" class="img_foot" target="_blank"></a>
        </div>

        <div class="foot_pilar" id="newsletter">
          <!-- <h3>Newsletter</h3> -->
          <form class="form_sub" action="modelo/crud_newsletter.php" method="post">

          <p class="ph3footer" >Newsletter</p>
          <p class="foot_n">Suscribete para resivir las buenas nuevas al instante.</p>


          <input class="newsemail" name="txtsuscribe" value="" type="email" placeholder="&#9993;  Email" required>
          <input class="btn_submit" type="submit" value="SUSCRIBIRSE">

        </form>
      </div>

      <div class="foot_pilar">
        <!-- <h3>Cosas Aburridas</h3> -->
        <p class="ph3footer" >Cosas Aburridas</p>
        <p class="foot_n"> &copy; Copyright 2018. Verbena de la buena. Orizaba, Veracruz. 94300. Todos los derechos reservados. Trabajando bajo la licencia de Creative Commons.</p>
        </div>
        </div>
      </div>

    </footer>

  </body>
</html>
