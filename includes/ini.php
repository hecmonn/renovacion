<?php
require_once("functions.php");
if (session_status() === PHP_SESSION_NONE) session_start();

require_once("Database.php");
require_once("Usuarios.php");
require_once("Alumnos.php");
define("HEADER","/Applications/XAMPP/htdocs/renovacion/includes/header.php");
define("FOOTER","/Applications/XAMPP/htdocs/renovacion/includes/footer.php");

setlocale(LC_MONETARY, 'en_US');
?>
