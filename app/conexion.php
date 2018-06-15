<?php 
>>>>>>> f6d62393e918ef07a129d973e8d8521f82944d18
const DB_HOST = '127.0.0.1';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'pricing';

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($conexion, 'UTF8');

?>