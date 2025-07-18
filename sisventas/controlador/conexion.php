<?php
$host = "localhost";
$dbname = "sistema_ventas";
$user = "root";      // Cambia por tu usuario de MySQL
$pass = "";          // Cambia por tu contraseña de MySQL

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
