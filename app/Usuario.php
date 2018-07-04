<?php

class Usuario {

	public $username = "";
	public $password = "";
	public $email = "";
	
	function validar_alta($username, $password, $email) {
		if ($username == "" || $password == "" || $email == "") {
			throw new Exception("No puede haber datos vacíos");
		}
		
	}

}

?>