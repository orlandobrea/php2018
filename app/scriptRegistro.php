<?php 
session_start();
require 'conexion.php';


$user = $_POST['usuario'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$captcha = $_POST['captcha_code'];

if (!empty($_POST)) { // Viene con datos => agrego el registro

	// Completar codigo de agregar registro a la base de datos

	$upload = "INSERT INTO usuarios (username, password, email) VALUES ('$user', '$pwd', '$email')";

	$rs = mysqli_query($conexion, $upload);

	if ($rs == true)
	{
		echo 'Datos enviados';
		header ('Location: index.php');
	}
	else
	{
		echo 'Datos no enviados. ERROR!!!';
	}

	// ..hasta aca
}



?>