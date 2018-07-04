<?php 
const DB_HOST = '127.0.0.1';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'pricing';

require 'autoload.php';

$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($conexion, 'UTF8');

?>
