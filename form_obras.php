<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">  <!-- Google web font "Open Sans" -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/agrega_producto.css">
    <link rel="icon" href="img/verbena.ico">
    <title>e-commerce</title>
  </head>
  <body>

       <?php
      session_start();
      include_once 'modelo/verifica_sesion.php';
      include 'modelo/sget_obras.php';
      $objObra = new obras();
      if ($sesion_user=="cliente" ) {
        header('Location: inicio.php');
      }
       ?>
      <div class="fondo_agrega_producto">
        <div class="contenedor_form_producto">
          <!-- <h3>AGREA UN EVENTO</h3> -->
          <div class="formulario">
            <?php

            try {

              $clv_ope=$_POST["txtope"];
              if($clv_ope == "m" || $clv_ope == "e"){
                $id_ope=$_POST["txtid"];
                $objObra->tablaobras($id_ope);
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
          <form name="obras" class="" action="" method="post">

            <div class="input_box">
              <label class="label_uno" for="txtnombreobra"><i class="fas fa-shopping-bag"></i></label>
              <input class="input_ancho" type="text" name="txtnombreobra" value="<?php echo $objObra->getnombre(); ?>" placeholder="Nombre" <?php echo $editable ?>>
            </div>

            <div class="input_box">

              <label class="label_dos" for="txtartista"><i class="fas fa-coffee"></i></label>
              <input class="input_ancho" type="text" name="txtartista" value="<?php echo $objObra->getartista(); ?>" placeholder="Artista" <?php echo $editable ?>>

              <label class="label_tres" for="txtcategoria"><i class="fas fa-folder-open"></i></label>
              <!-- <input class="input_ancho" type="text" name="nombre_evento" value="" placeholder="Categoría"> -->
              <select class="categoria" name="txtcategoria" >
                <option value="<?php echo $objObra->getcategoria(); ?>"><?php echo $objObra->getcategoria(); ?></option>
                <option value="Decoración" <?php echo $editable ?>>Decoración</option>
                <option value="Ropa" <?php echo $editable ?>>Ropa</option>
                <option value="Bisuteria" <?php echo $editable ?>>Bisuteria</option>
                <option value="Accesorios" <?php echo $editable ?>>Accesorios</option>
                <option value="Otro" <?php echo $editable ?>>Otro</option>
              </select>

              <label class="label_cuatro" for="txtprecio"><i class="fas fa-fire"></i></label>
              <input class="input_ancho" type="text" name="txtprecio" value="<?php echo $objObra->getprecio(); ?>" placeholder="Precio" <?php echo $editable ?>>

            </div>

            <div class="input_box">

              <label class="label_cinco" for="txtdescripcion"><i class="fas fa-edit"></i></label>
              <input class="input_ancho" type="text" name="txtdescripcion" value="<?php echo $objObra->getdescripcion(); ?>" placeholder="Descripción" <?php echo $editable ?>>

            </div>

            <input type="hidden" name="txtope_crud" value="<?php echo $clv_ope?>">
            <input type="hidden" name="txtid_crud" value="<?php echo $objObra->getid(); ?>">

              <input type="submit" name="" class="btn-enviar" id="btn-enviar" value="Listo" onclick="obras.action='modelo/crud_obra.php';">
              <input type="submit" name="" class="btn-cancelar" id="btn-cancelar" value="Cancelar" onclick="obras.action='tabla_obras.php';">

            </form>
            </div>
        </div>
      </div>
  </body>
</html>
