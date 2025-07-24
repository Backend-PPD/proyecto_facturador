<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/usuarioController.php";

$nomusuario = $_POST['nomusuario'];
$password = $_POST['password'];
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$estado = $_POST['estado'];

$usuarioCtrl = new UsuarioController();
$res = $usuarioCtrl->inserta_usuario($nomusuario, $password, $apellidos, $nombres, $email, $estado);

if ($res) {
    header("Location: listado.php");
} else {
    echo "Error al grabar el usuario";
}