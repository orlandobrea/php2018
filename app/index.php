<?php

require("conexion.php");

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


?>

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

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
      </nav>

      <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Pricing</h1>
      <?php

      session_start();

      //$_SESSION['id'] = 1;

      //Para probar que funcione

      // session_destroy();

      //Para borrar la sesion guardada

      if(isset($_SESSION['id'])){
         echo '<p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It is built with default Bootstrap components and utilities with little customization.</p>';
       }
       else{
        echo '<p class="lead">You need to login to see the pricing options</p>';
       }

     

      ?>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <?php
        $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

       

        if(isset($_SESSION['id'])){      


        $obtenerTablas = mysqli_query($conexion, "select * from producto");
        $cantidadTarjetas = mysqli_num_rows($obtenerTablas);


        
        for ($i=1; $i <= $cantidadTarjetas ; $i++) {


        echo '<div class="card mb-4 box-shadow">
          <div class="card-header">';

              $obtenerTablas = mysqli_query($conexion, "select * from producto where id=$i");

              while ($dato = mysqli_fetch_array($obtenerTablas)) {
                echo '<h4 class="my-0 font-weight-normal">'.$dato['titulo'].'</h4>';
              }

      
            
          echo '  
          </div>
          <div class="card-body">';

            


              $obtenerTablas = mysqli_query($conexion, "select * from producto where id=$i");

              while ($dato = mysqli_fetch_array($obtenerTablas)) {
                echo '<h1 class="card-title pricing-card-title">$'.$dato['precio'].' <small class="text-muted">/ mo</small></h1>';
              }

      
            
           echo '

            <ul class="list-unstyled mt-3 mb-4">';
             

              $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

              $obtenerTablas = mysqli_query($conexion, "select * from producto_caracteristica where producto_id=$i");

              while ($dato = mysqli_fetch_array($obtenerTablas)) {
                echo '<li>'.$dato['detalle'].'</li>';
              }

      
            echo '
            </ul>';
            


              $obtenerTablas = mysqli_query($conexion, "select * from producto where id=$i");

              while ($dato = mysqli_fetch_array($obtenerTablas)) {
                echo '<a href="alta.php?id='.$i.'" class="btn btn-lg btn-block btn-outline-primary">'.$dato['titulo_boton'].'</a>';
              }

      
              
          echo '  
          </div>
        </div>'; }}
        else{

            echo '<div id = "containerLogin"><a href="login.php" class="btn btn-lg btn-block btn-outline-primary">Login</a></div>';
        }
        ?>
      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
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
