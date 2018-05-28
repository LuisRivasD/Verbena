<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Tabla Obras</title>
  </head>
  <body>

    <?php
    session_start();
    include_once 'modelo/verifica_sesion.php';
    include_once 'modelo/sget_obras.php';
    include 'basedatos/conexion.php';
    if ($sesion_user=="cliente" ) {
      header('Location: inicio.php');
    }
    ?>

    <div class="fondo_tabla">
      <h2>OBRAS</h2>
      <div class="contenedor_tabla">
        <form name="form_obras" class="" action="" method="post">

          <input type="hidden" name="txtope">
          <input type="hidden" name="txtid">

          <table class="tabla_clientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Artista</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th colspan="2">Operaciones</th>
              </tr>
            </thead>

            <?php
            $result=pg_query($conexion, 'select * from obra order by id_obra desc');
            while ($dato = pg_fetch_array($result)){

              $objObra = new obras();

              $auxid=$dato['id_obra'];
              $objObra->setid($dato['id_obra']);
              $objObra->setnombre($dato['nombre']);
              $objObra->setartista($dato['artista']);
              $objObra->setcategoria($dato['categoria']);
              $objObra->setdescripcion($dato['descripcion']);
              $objObra->setprecio($dato['precio']);

              ?>
              <tr>
                <td><?php echo $objObra->getid() ?></td>
                <td><?php echo $objObra->getartista() ?></td>
                <td><?php echo $objObra->getnombre() ?></td>
                <td><?php echo $objObra->getdescripcion() ?></td>
                <td><?php echo "$ ".$objObra->getprecio() ?></td>
                <td><?php echo $objObra->getcategoria() ?></td>
                <td><input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Modificar" onClick="form_obras.action='form_obras.php';txtope.value='m';txtid.value='<?php echo $objObra->getid() ?>'"></td>
                <td><input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Eliminar" onClick="form_obras.action='form_obras.php';txtope.value='e';txtid.value='<?php echo $objObra->getid() ?>'"></td>
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

          <input type="submit" name="" class="btn-agregar" id="btn-agregar" value="Agregar" onClick="form_obras.action='form_obras.php';txtope.value='g'">
        </form>
    </div>
  </body>
  </html>
