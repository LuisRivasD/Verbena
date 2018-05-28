<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="icon" href="img/verbena.ico">
    <title>Usuarios Cliente</title>
  </head>
  <body>

    <?php
    session_start();
    include_once 'modelo/verifica_sesion.php';
    include_once 'modelo/sget_persona.php';
    include_once 'modelo/sget_newsletter.php';
    include 'basedatos/conexion.php';
    if ($sesion_user=="cliente" ) {
      header('Location: inicio.php');
    }
    ?>

    <div class="fondo_tabla">
      <h2>CLIENTES</h2>
      <div class="contenedor_tabla">
        <form name="form_cliente" class="" action="" method="post">

          <input type="hidden" name="txtope">
          <input type="hidden" name="txtid">

          <table class="tabla_clientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th colspan="2">Operaciones</th>
              </tr>
            </thead>

            <?php
            $result=pg_query($conexion, 'select * from usuario order by id_usuario desc');
            while ($dato = pg_fetch_array($result)){

              $objPersona = new persona();

              $objPersona->setid($dato['id_usuario']);
              $objPersona->setusuario($dato['usuario']);
              $objPersona->setcontrasena($dato['contrasena']);
              $objPersona->setnombre($dato['nombre']);
              $objPersona->setpaterno($dato['ap_paterno']);
              $objPersona->setmaterno($dato['ap_materno']);
              $objPersona->setemail($dato['email']);
              $objPersona->settelefono($dato['telefono']);
              $objPersona->setdireccion($dato['direccion']);

              ?>
              <tr>
                <td><?php echo $objPersona->getid() ?></td>
                <td><?php echo $objPersona->getusuario() ?></td>
                <td><?php echo $objPersona->getNombreCompleto() ?></td>
                <td><?php echo $objPersona->getemail() ?></td>
                <td><?php echo $objPersona->gettelefono() ?></td>
                <td><?php echo $objPersona->getdireccion() ?></td>
                <td><input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Modificar" onClick="form_cliente.action='form_cliente.php';txtope.value='m';txtid.value='<?php echo $objPersona->getid() ?>'"></td>
                <td><input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Eliminar" onClick="form_cliente.action='form_cliente.php';txtope.value='e';txtid.value='<?php echo $objPersona->getid() ?>'"></td>
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
          <input type="submit" name="" class="btn-agregar" id="btn-agregar" value="Agregar" onClick="form_cliente.action='form_cliente.php';txtope.value='g'">
        </form>
    </div>

    <div  class="fondo_news" id="newsdiv">
      <h2>NEWSLETTER</h2>
      <div class="contenedor_news">
        <form name="newsletter" class="" action="" method="post">
          <input type="hidden" name="txtope" value="g">
          <input type="hidden" name="txtid">

        <div class="crud_formulario">
          <h2>CRUD</h2>
          <div class="input_box">
            <label class="label_seis" for="txtemail"><i class="fas fa-envelope"></i></label>
            <input class="input_ancho" type="email" name="txtsuscribe" value="" placeholder="Correo Electronico" required>
          </div>

          <input type="submit" name="" class="btn-listo" id="btn-enviar" value="Listo" onClick="newsletter.action='modelo/crud_newsletter.php'">
          <input type="submit" name="" class="btn-cancel" id="btn-cancelar" value="Eliminar" onClick="newsletter.action='modelo/crud_newsletter.php';txtope.value='e';">

        </div>

        <div class="tabla_form">
          <h2>SUBSCRIPCIONES</h2>

            <table class="table_news">

              <thead>
                <tr>
                  <th>ID</th>
                  <th colspan="2">E-mail</th>
                </tr>
              </thead>

              <?php
              $result=pg_query($conexion, 'select * from newsletter order by id_newsletter desc');
              while ($dato = pg_fetch_array($result)){

                $objNews = new news();
                $aux=$dato['id_newsletter'];
                $objNews->setid($dato['id_newsletter']);
                $objNews->setemail($dato["email"]);
                ?>
                <tr>
                  <td><?php echo $objNews->getid() ?></td>
                  <td><?php echo $objNews->getemail() ?></td>
                  <td><input type="button" name="" class="btn-enviar" id="btn-enviar" value="Editar" onClick="txtsuscribe.value='<?php echo $objNews->getemail() ?>';txtid.value='<?php echo $objNews->getid() ?>';txtope.value='m'"></td>
                </tr>
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
      </form>

      </div>
    </div>

  </body>
  </html>
