<?php
// Pagina de logout
session_start();
session_destroy();
header("Location: index.php");

?>