<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "loja";
$dsn = "mysql:host=$host;dbname=$dbname";

//cria uma constante que pode ser acessada
define("dsn", $dsn);
define("user", $user);
define("password", "$password");

?>