<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="icon" href="img/verbena.ico">
    <!-- <script src="js/editor.js" charset="utf-8"></script>
    <script src="js/resena.js" charset="utf-8"></script> -->
    <title>Tabla Resenas</title>
  </head>
  <body>

    <?php
    session_start();
    include_once 'modelo/verifica_sesion.php';
    include_once 'modelo/sget_resena.php';
    include 'basedatos/conexion.php';
    if ($sesion_user=="cliente" ) {
      header('Location: inicio.php');
    }
    ?>

    <div class="fondo_tabla">
      <h2>RESEnAS</h2>
      <div class="contenedor_tabla">
        <form name="form_resena" class="" action="" method="post">

          <input type="hidden" name="txtope">
          <input type="hidden" name="txtid">

          <table class="tabla_clientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th colspan="2">Operaciones</th>
              </tr>
            </thead>

            <?php
            $result=pg_query($conexion, 'select * from resena order by id_resena desc');
            while ($dato = pg_fetch_array($result)){

              $objResena = new resena();

              $objResena->setid($dato['id_resena']);
              $objResena->settitulo($dato['titulo']);
              $objResena->setautor($dato['autor']);
              $objResena->setfechapub($dato['fecha_pub']);
              $objResena->sethorapub($dato['hora']);
              $objResena->setcontenido($dato['descripcion']);

              ?>
              <tr>
                <td><?php echo $objResena->getid(); ?></td>
                <td><?php echo $objResena->getautor(); ?></td>
                <td><?php echo $objResena->gettitulo(); ?></td>
                <!-- html_entity_decode -->
                <td><?php echo substr(strip_tags($objResena->getcontenido()),0,70)."..."; ?></td>
                <td><?php echo $objResena->getfechapub(); ?></td>
                <td><?php echo $objResena->gethorapub(); ?></td>
                <td><input type="submit" name="" class="btn-enviar" id="btn-modificar" value="Modificar" onClick="form_resena.action='form_resena.php';txtope.value='m';txtid.value='<?php echo $objResena->getid() ?>';colocatexto();"></td>
                <td><input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Eliminar" onClick="form_resena.action='form_resena.php';txtope.value='e';txtid.value='<?php echo $objResena->getid() ?>'"></td>
              </tr>
              <?php
            }
            if (!empty(pg_fetch_array($result))) {
              echo "<tr><td colspan='8' >NO HAY DATOS</td></tr>";
            }
            pg_close($conexion);
            ?>
          </table>
        </div>
          <input type="submit" name="" class="btn-agregar" id="btn-agregar" value="Agregar" onClick="form_resena.action='form_resena.php';txtope.value='g'">
        </form>
    </div>
  </body>
  </html>
