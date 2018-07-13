<?php

include "Usuario.php";


/*
echo "<h2>Listado de usurios</h2>";
var_dump(Usuario::listar());

echo "<h2>Usuario con id 4</h2>";
var_dump(Usuario::obtenerUno(4));
*/
/*
echo "<h2>Agregar usuario</h2>";
$usuario = new Usuario();
$usuario->username = 'nuevoUs';
$usuario->password = 'nuevoPwd';
$usuario->email = 'prueba@gmail.com';
$usuario->guardar();
var_dump(Usuario::listar());
*/

echo "<h2>Borrar usuario con id 4</h2>";
$usuario = Usuario::obtenerUno(3);
$usuario->username ='orlando';
$usuario->setPassword('orlando');
$usuario->modificar();



?>