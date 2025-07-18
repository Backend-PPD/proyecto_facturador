<?php
session_start();

require_once 'conexion.php';  // Incluye el archivo de conexión

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($usuario) || empty($password)) {
    echo "Por favor, completa todos los campos.";
    exit;
}

$usuario = $conn->real_escape_string($usuario);

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    if (hash('sha256', $password) === $row['password']) {
        $_SESSION['usuario'] = $row['usuario'];
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$conn->close();
?>
