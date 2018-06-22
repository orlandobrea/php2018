<?php
// Pagina de logout - y un texto me me habia olvidado
session_start();
session_destroy();
header("Location: index.php");

?>