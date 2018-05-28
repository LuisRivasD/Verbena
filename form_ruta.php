<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/agrega_rutas.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Rutas</title>
  </head>
  <body>

      <?php
      session_start();
      include_once 'modelo/verifica_sesion.php';
      include 'modelo/sget_ruta.php';
      $objRuta = new rutas();
      if ($sesion_user=="cliente" ) {
        header('Location: inicio.php');
      }
       ?>
      <div class="fondo_agrega_ruta">
        <div class="contenedor_form_ruta">
          <!-- <h3>AGREA UN EVENTO</h3> -->
          <div class="formulario">
            <?php

            try {
              $clv_ope=$_POST["txtope"];
              if($clv_ope == "m" || $clv_ope == "e"){
                $id_ope=$_POST["txtid"];
                $objRuta->tablaruta($id_ope);
              }else{
              }

              if ($clv_ope == "e") {
                $editable="disabled";
              }else{
                $editable="";
              }
            } catch (Exception $e) {
            }

             ?>
          <form name="ruta" class="" action="" method="post">
            <div class="input_box">
              <label class="label_uno" for="txtnombreruta"><i class="fas fa-map"></i></label>
              <input class="input_ancho" type="text" name="txtnombreruta" value="<?php echo $objRuta->getnombre(); ?>" placeholder="Nombre de la ruta" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_dos" for="txtpostal"><i class="fas fa-map-pin"></i></label>
              <input class="input_ancho" type="text" name="txtpostal" value="<?php echo $objRuta->getcp(); ?>" placeholder="Código Postal" <?php echo $editable ?>>
            <!-- </div>
            <div class="input_box"> -->
              <label class="label_uno" for="txtcalle"><i class="fas fa-map-signs"></i></label>
              <input class="input_ancho" type="text" name="txtcalle" value="<?php echo $objRuta->getcalle(); ?>" placeholder="Calle o Avenida" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_uno" for="txtcolonia"><i class="fas fa-map-signs"></i></label>
              <input class="input_ancho" type="text" name="txtcolonia" value="<?php echo $objRuta->getcolonia(); ?>" placeholder="Colonia" <?php echo $editable ?>>
            <!-- </div>
            <div class="input_box"> -->
              <label class="label_tres" for="txtciudad"><i class="fas fa-building"></i></label>
              <input class="input_ancho" type="text" name="txtciudad" value="<?php echo $objRuta->getciudad(); ?>" placeholder="Ciudad" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_uno" for="txtext"><i class="fal fa-hashtag"></i></label>
              <input class="input_ancho" type="text" name="txtext" value="<?php echo $objRuta->getnumext(); ?>" placeholder="Número Exterior" <?php echo $editable ?>>
            <!-- </div>
            <div class="input_box"> -->
              <label class="label_uno" for="txtint"><i class="fal fa-hashtag"></i></label>
              <input class="input_ancho" type="text" name="txtint" value="<?php echo $objRuta->getnumint(); ?>" placeholder="Número Interior" <?php echo $editable ?>>
            </div>
            <div class="input_box">
              <label class="label_uno" for="txtmaps"><i class="fas fa-street-view"></i></label>
              <input class="input_ancho" type="text" name="txtmaps" value="<?php echo $objRuta->getcoordenadasformulario(); ?>" placeholder="URL de Google Maps" <?php echo $editable ?>>
            </div>

            <input type="hidden" name="txtope_crud" value="<?php echo $clv_ope?>">
            <input type="hidden" name="txtid_crud" value="<?php echo $objRuta->getid(); ?>">

              <input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Listo" onclick="ruta.action='modelo/crud_ruta.php';">
              <input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Cancelar" onclick="ruta.action='tabla_rutas.php';">

            </form>
            </div>
        </div>
      </div>
  </body>
</html>
