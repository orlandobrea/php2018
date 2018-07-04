<?php 
session_start();
require 'conexion.php';

$usr = $_POST['usuario'];
$email = $_POST['email'];
$pwd = md5($_POST['password']);
$captcha = $_POST['captcha_code'];

include_once '/securimage/securimage.php';
$securimage = new Securimage();
if ($securimage->check($_POST['captcha_code']) == false) {
echo "Captcha incorrecto";
exit; // Termina la ejecución del script
}
else
{
if (!empty($_POST)) { // Viene con datos => agrego el registro

	// Completar codigo de agregar registro a la base de datos

	$usuario = new Usuario($usr,$email,$pwd);
	try {
		$usuario->validar_alta();
		$up = $conexion->query("INSERT INTO usuarios (username, password, email) VALUES ('$usr', '$pwd', '$email')";
		echo 'Datos enviados';
		header ('Location: index.php');
	} catch (Exception $e) {
		echo 'Mensaje:'.$e->getMessage();
	}
}
}

?>