<?php
require_once '/Twig/Autoloader.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array('auto_reload '=>true));

session_start();


if (!empty($_POST)) {
    require 'conexion.php';

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
//      header("location: login.php");
    }
}


$parametros = array('error' => @$_SESSION['msgError'], 'post' => $_POST);

echo $twig->render('login.html', $parametros);

?>

