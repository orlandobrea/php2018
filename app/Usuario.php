<?php
require 'conexion.php';

class Usuario {
	public $id;
	public $username = "";
	public $password = "";
	public $email = "";

	function __construct($username, $password, $email) {
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
	}

	function ObtenerUno($id){
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$consulta = "select * from usuarios where id=$id";
		$rtaConsulta = $mysqli->query($consulta);
		$resp = $rtaConsulta->fetch_object();
		return $resp;
	}

	function validar_alta() {
		if ($this->username == "" || $this->password == "" || $this->email == "") {
			throw new Exception("No puede haber datos vacíos");
		}
		
	}

	static function listar() {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$consulta = "select * from usuarios";
		$rtaConsulta = $mysqli->query($consulta);
		$respuesta = array();
		while($unUsuario = $rtaConsulta->fetch_object("Usuario")) {
			array_push($respuesta, $unUsuario);
		}
		return $respuesta;
	}


	function guardar(){
		$this->validar_alta();
		$usuario = $this->username;
		$contrasenia = md5($this->password);
		$correo = $this->email;

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		//$consulta = $mysqli->query("select * from usuarios");

		$upload = "INSERT INTO usuarios (username, password, email) VALUES ('$usuario', '$contrasenia', '$correo')";
		$rs = mysqli_query($mysqli, $upload);
	}
}

?>