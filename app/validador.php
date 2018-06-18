
    <?php 
    require 'conexion.php';

    session_start();
    $user = $_POST['inputUser'];
    $pass = $_POST['inputPass'];
    $pass = md5($pass);


    // CONSULTA LA PRIMER TABLA
    $r = mysqli_query($conexion, "select * from usuarios where username = '$user' and password = '$pass'");
    $fetchFetch = mysqli_fetch_array($r);

    if ($fetchFetch)
    {
      $_SESSION["id"] = $fetchFetch['id'];
      header("location: index.php");
    }
    else
    {
      $_SESSION["msgError"] = "Ingresaste un usuario o contraseña erróneos.";
      header("location: login.php");
    }
    ?>