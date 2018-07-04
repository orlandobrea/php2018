<?php
require 'conexion.php';

class Usuario {

	public $username = "";
	public $password = "";
	public $email = "";
	
	function validar_alta($username, $password, $email) {
		if ($username == "" || $password == "" || $email == "") {
			throw new Exception("No puede haber datos vacíos");
		}
		
	}	

	function guardar(){

		$usuario = this ->$username;
		$contrasenia = md5(this ->$password);
		$correo = this->$email;

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$consulta = $mysqli->query("select * from usuarios");

		$upload = "INSERT INTO usuarios (username, password, email) VALUES ('$usuario', '$contrasenia', '$correo')";
		$rs = mysqli_query($mysqli, $upload);
	}
}

?>