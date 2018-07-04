<?php 
session_start();
require 'conexion.php';

$usr = $_POST['usuario'];
$email = $_POST['email'];
$pwd = $_POST['password'];
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

	$usuario = new Usuario($usr,$pwd, $email);
	try {
		$usuario->validar_alta();
		$usuario->guardar();
		echo 'Datos enviados';
		header ('Location: index.php');
	} catch (Exception $e) {
		echo 'Mensaje:'.$e->getMessage();
	}
}
}

?>