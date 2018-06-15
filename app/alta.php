<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pricing example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>

  <body>
    
    <?php 
    require 'conexion.php';
    $id = $_GET["id"]; 

    // CONSULTA LA PRIMER TABLA
    $resultado_consulta_TABPRODUCTO = mysqli_query($conexion, "select * from producto where id = '$id'");
    $vector_fila = mysqli_fetch_array($resultado_consulta_TABPRODUCTO);

    $tit = $vector_fila["titulo"];
    $precio = $vector_fila["precio"];

    // CONSULTA LA SEGUNDA TABLA
        $resultado_consulta_TABPRODUCTO_CARACTERISTICA_AMP = mysqli_query($conexion, "select * from producto_caracteristica_ampliada where producto_id = '$id'");
    ?>
    
    <div class="container-fluid">
      <div class="jumbotron jumbotron-fluid">
        <div class="row">
          <div class="col-md-6 text-center">
            <h1 class="display-4">
              Paquete <?php echo $tit; ?>
            </h1>              
          </div>
          <div class="col-md-6 text-center">
            <h1 class="display-4">
              $<?php echo $precio; ?>
            </h1>
          </div>
          </div>
      </div>

      <ul style="font-size: 24px;">
      <?php 
        while ($r = mysqli_fetch_array($resultado_consulta_TABPRODUCTO_CARACTERISTICA_AMP)) {
        echo "<li>";
        echo $r["detalle"];
        echo "</li>";
      };
       ?>
     </ul>




    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
