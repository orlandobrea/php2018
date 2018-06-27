<?php
	// Indicamos que vamos a mostrar una imagen PNG

	$id = $_GET['id'];

	require("conexion.php");
	
	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	session_start();
	
	header("content-type: image/png");

	// Obtenemos el ancho y largo desde parámetros GET
	$ancho = $_GET["w"];
	$alto = $_GET["h"];

	// Fijamos el nombre de la imagen (tambien lo podríamos recibir por GET)
	$obtenerImagen = mysqli_query($conexion, "select * from producto where id=$id");

	$dato = mysqli_fetch_array($obtenerImagen);

	$ruta_imagen = $dato['ubicacion_imagen'];
	

	// Leemos la imagen original
	$imagen_original = imagecreatefrompng($ruta_imagen);
	// Obtenemos la información de la imagen original
	$propiedades_imagen = getimagesize($ruta_imagen);
	$origen_ancho = $propiedades_imagen[0];
	$origen_alto = $propiedades_imagen[1];
	
	// Creamos una nueva imagen (la destino) con el ancho y alto que nos pasaron como parametros
	$imagen_nueva = imagecreatetruecolor($ancho, $alto);
	$imagen = imagecreatefrompng($ruta_imagen);
	// Redimensionamos la imagen
	imagecopyresampled($imagen_nueva, $imagen, 0, 0, 0, 0, $ancho, $alto, $origen_ancho, $origen_alto);

	// Mostramos la imagen como PNG
	imagepng($imagen_nueva);

	// Liberamos el espacio de memoria
	imagedestroy($imagen);
	imagedestroy($imagen_nueva);

?>