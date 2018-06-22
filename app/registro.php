
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>

        <div class="container" id="principal">
            <a href="index.php" class="btn">Home</a>

             <h1>Formulario de Registro</h1>

             <form method="post" enctype="multipart/form-data" action="scriptRegistro.php">
                 <div class="form-row">
                   <div class="form-group col-md-12">
                     <label for="usuario">Usuario</label>
                     <input type="text" class="form-control" id="usuario" placeholder="usuario" name="usuario">
                   </div>
                   <div class="form-group col-md-12">
                       <label for="email">Email</label>
                       <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
                   </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-md-12">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" id="password" name="password" placeholder="ingrese su password">
                     </div>
                 </div>

                 <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
                  <input type="text" name="captcha_code" size="10" maxlength="6" />
                  <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Cambiar imagen ]</a>
                  <br>

                 <input type="submit" value="Agregar" class="btn btn-primary">
                 
             </form>
         </div>

     </body>
</html>
