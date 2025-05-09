<?php

$host = "localhost:3306";
$user = "root";
$password = "123456";
$db = "nooficios_db";

/*
$host = "localhost";
$user = "u676715632_ftpunam";
$password = "icoAragonUnam2233";
$db = "u676715632_oficiosUnam";
*/
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
