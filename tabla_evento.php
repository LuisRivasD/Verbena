<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Tabla Eventos</title>
  </head>
  <body>

    <?php
    session_start();
    include_once 'modelo/verifica_sesion.php';
    include_once 'modelo/sget_evento.php';
    include_once 'modelo/sget_galeria.php';
    include 'basedatos/conexion.php';
    if ($sesion_user=="cliente" ) {
      header('Location: inicio.php');
    }
    ?>

    <div class="fondo_tabla">
      <h2>EVENTOS</h2>
      <div class="contenedor_tabla">
        <form name="form_evento" class="" action="" method="post">

          <input type="hidden" name="txtope">
          <input type="hidden" name="txtid">

          <table class="tabla_clientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Organizador</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th colspan="2">Operaciones</th>
              </tr>
            </thead>

            <?php
            $result=pg_query($conexion, 'select * from evento order by id_evento desc');
            while ($dato = pg_fetch_array($result)){

              $objEvento = new evento();

              $objEvento->setid($dato['id_evento']);
              $objEvento->setnombre($dato['nombre']);
              $objEvento->setdireccion($dato['direccion']);
              $objEvento->setfecha($dato['fecha']);
              $objEvento->sethrinicio($dato['hora_inicio']);
              $objEvento->sethrfin($dato['hora_fin']);
              $objEvento->setorganizador($dato['organizador']);
              $objEvento->setclasificacion($dato['clasificacion']);
              $objEvento->setcategoria($dato['categoria']);
              $objEvento->setdescripcion($dato['descripcion']);

              ?>
              <tr>
                <td><?php echo $objEvento->getid() ?></td>
                <td><?php echo $objEvento->getorganizador() ?></td>
                <td><?php echo $objEvento->getnombre() ?></td>
                <td><?php echo $objEvento->getdireccion() ?></td>
                <td><?php echo $objEvento->getfecha() ?></td>
                <td><?php echo $objEvento->gettiempo() ?></td>
                <td><input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Modificar" onClick="form_evento.action='form_evento.php';txtope.value='m';txtid.value='<?php echo $objEvento->getid() ?>'"></td>
                <td><input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Eliminar" onClick="form_evento.action='form_evento.php';txtope.value='e';txtid.value='<?php echo $objEvento->getid() ?>'"></td>
              </tr>
              <?php
            }
            if (!empty(pg_fetch_array($result))) {
              echo "<tr><td colspan='8' >NO HAY DATOS</td></tr>";
            }
            // pg_close($conexion);
            ?>
          </table>
        </div>

          <input type="submit" name="" class="btn-agregar" id="btn-agregar" value="Agregar" onClick="form_evento.action='form_evento.php';txtope.value='g'">
        </form>
    </div>


    <div  class="fondo_news" id="newsdiv">
      <h2>GALERIAS</h2>
      <div class="contenedor_news">
        <form name="galeria" class="" action="" method="post">
          <input type="hidden" name="txtope" value="g">
          <input type="hidden" name="txtid">

        <div class="crud_formulario">
          <h2>CRUD</h2>

          <img src="img/shoot_verbena.png" alt="" id="imgshoot">

          <div class="input_box">
            <label class="label_seis" for="txtemail"><i class="fab fa-instagram"></i></label>
            <input class="input_ancho" type="text" name="txthtmlinsta" value="" placeholder="HTML Instagram" required>
          </div>

          <input type="submit" name="" class="btn-listo" id="btn-enviar" value="Listo" onClick="galeria.action='modelo/crud_galeria.php'">
          <input type="submit" name="" class="btn-cancel" id="btn-cancelar" value="Eliminar" onClick="galeria.action='modelo/crud_galeria.php';txtope.value='e';">

        </div>

        <div class="tabla_form">
          <h2>INSTAGRAM PICTURES</h2>
          <div class="scroll_tabla">
            <table class="table_news">

              <thead>
                <tr>
                  <th>ID</th>
                  <th colspan="2">HTML Instagram</th>
                </tr>
              </thead>

              <?php
              $result=pg_query($conexion, 'select * from galeria order by id_imagen desc');
              while ($dato = pg_fetch_array($result)){

                $objGaleria = new galeria();
                $aux=$dato['id_imagen'];
                $objGaleria->setid($dato['id_imagen']);
                $objGaleria->sethtml($dato["html_instagram"]);
                ?>
                <tr>
                  <td><?php echo $objGaleria->getid(); ?></td>
                  <td><?php echo substr ($objGaleria->gethtmlformulario(),0,60) ?></td>
                  <td><input type="button" name="" class="btn-enviar" id="btn-enviar" value="Editar" onClick="javascript:mostrar_imagen('<?php echo $objGaleria->gethtml(); ?>');txtid.value='<?php echo $objGaleria->getid() ?>';txtope.value='m';txthtmlinsta.value='<?php echo $objGaleria->gethtmlformulario(); ?>';"></td>
                </tr>

                <script type="text/javascript">
                function mostrar_imagen(url) {
                   document.getElementById('imgshoot').src = url;
                 }
                </script>
                <?php

              }pg_close($conexion);
              if(empty($aux)){
                ?>
                <td colspan="3">NO HAY DATOS</td>
                <?php
              }

              ?>

            </table>
          </div>
        </div>
      </form>

      </div>
    </div>

  </body>
  </html>
