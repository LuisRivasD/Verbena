<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/rutas.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Rutas</title>
  </head>
  <body>

      <?php
       include 'includes/header.php';
       include_once 'modelo/sget_ruta.php';
       include 'basedatos/conexion.php';
      ?>
      <div class="seccion_1">
        
          <img src="img/rutas.svg" alt="">

      </div>

      <div class="seccion_2">
        <div class="contenedorRuta">
          <!-- <p>RUTAS</p> -->
          <div class="rutas">
            <div class="fondotablaRutas">

              <div class="tablaRutas">
                <table class="tabla_rutas">
                  <thead>
                    <tr>
                      <th class="lugar">Lugar</th>
                      <th>Información</th>
                    </tr>
                  </thead>
                  <?php
                  $result=pg_query($conexion, 'select * from ruta order by id_ruta desc');
                  while ($dato = pg_fetch_array($result)){

                    $objRuta = new rutas();

                    $objRuta->setid($dato['id_ruta']);
                    $auxid=$dato['id_ruta'];
                    $objRuta->setnombre($dato['nombre']);
                    $objRuta->setcalle($dato['calle']);
                    $objRuta->setcp($dato['cp']);
                    $objRuta->setcolonia($dato['colonia']);
                    $objRuta->setciudad($dato['ciudad']);
                    $objRuta->setnumext($dato['num_ext']);
                    $objRuta->setnumint($dato['num_int']);
                    $objRuta->setcoordenadas($dato['coordenadas']);
                   ?>
                  <tr>
                    <td><?php echo $objRuta->getnombre() ?></td>
                    <td><input type="button" class="btn_ruta" name="" value="¿Comó llego?" onclick="javascript:datosRuta('<?php echo htmlentities($objRuta->getcoordenadas())?>',
                      '<?php echo $objRuta->getcalle() ?>','<?php echo $objRuta->getcp()?>','<?php echo $objRuta->getcolonia()?>','<?php echo $objRuta->getciudad()?>',
                      '<?php echo $objRuta->getnumeros()?>')">
                    </td>
                  </tr>

                  <script type="text/javascript">
                  function datosRuta(url, calle,cp,colonia,ciudad,extint) {
                     document.getElementById('mapsURL').innerHTML = url;
                     document.getElementById('datosTablaRuta').innerHTML = "<td class='nomCalle'>"+calle+"</td><td>"+cp+"</td><td>"+colonia+"</td><td>"+ciudad+"</td><td>"+extint+"</td>";

                   }
                  </script>
                  <?php
                }
                  if (empty($auxid)) {
                    ?>
                    <tr><td colspan="2">NO HAY DATOS</td></tr>
                      <?php
                    }
                    pg_close($conexion);
                   ?>

                </table>
              </div>
            </div>

            <div class="mapa">
              <div class="datos_ruta">
                <table class="tabla_rutas">
                  <thead>
                    <tr>
                      <th>Calle</th>
                      <th>C.P</th>
                      <th>Colonia</th>
                      <th>Ciudad</th>
                      <th>Ext - Int</th>
                    </tr>
                  </thead>

                  <tr id="datosTablaRuta">
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>

                </table>
              </div>

              <div class="google_maps" id="mapsURL">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60412.89663238948!2d-97.09934193492258!3d18.851290138151015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c502a4c0439f05%3A0xd83faa836b275780!2sOrizaba%2C+Ver.!5e0!3m2!1ses-419!2smx!4v1523123596789" width="650" height="377" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>

            </div>
          </div>
        </div>
      </div>
      <?php
      include 'includes/footer.php';
      ?>


  </body>
</html>
