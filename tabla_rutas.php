<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Tabla Rutas</title>
  </head>
  <body>

    <?php
    session_start();
    include_once 'modelo/verifica_sesion.php';
    include_once 'modelo/sget_ruta.php';
    include 'basedatos/conexion.php';
    if ($sesion_user=="cliente" ) {
      header('Location: inicio.php');
    }
    ?>

    <div class="fondo_tabla">
      <h2>RUTAS</h2>
      <div class="contenedor_tabla">
        <form name="form_ruta" class="" action="" method="post">

          <input type="hidden" name="txtope">
          <input type="hidden" name="txtid">

          <table class="tabla_clientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Ciudad</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>C.P</th>
                <th>Ext - Int</th>
                <th colspan="2">Operaciones</th>
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
                <td><?php echo $objRuta->getid() ?></td>
                <td><?php echo $objRuta->getciudad() ?></td>
                <td><?php echo $objRuta->getnombre() ?></td>
                <td><?php echo $objRuta->getcalle() ?></td>
                <td><?php echo $objRuta->getcp() ?></td>
                <td><?php echo $objRuta->getnumeros() ?></td>
                <td><input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Modificar" onClick="form_ruta.action='form_ruta.php';txtope.value='m';txtid.value='<?php echo $objRuta->getid() ?>'"></td>
                <td><input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Eliminar" onClick="form_ruta.action='form_ruta.php';txtope.value='e';txtid.value='<?php echo $objRuta->getid() ?>'"></td>
              </tr>
              <?php
            }

            if (empty($auxid)) {
              ?>
              <tr><td colspan="8">NO HAY DATOS</td></tr>
              <?php
            }
            pg_close($conexion);
            ?>
          </table>
        </div>

          <input type="submit" name="" class="btn-agregar" id="btn-agregar" value="Agregar" onClick="form_ruta.action='form_ruta.php';txtope.value='g'">
        </form>
    </div>
  </body>
  </html>
