<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/usuarioController.php";

$id = $_POST['id'];
$nomusuario = $_POST['nomusuario'];
$password = $_POST['password'];
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$estado = $_POST['estado'];

$usuarioCtrl = new UsuarioController();
$res = $usuarioCtrl->actualizar_usuario($id, $nomusuario, $password, $apellidos, $nombres, $email, $estado);

if ($res) {
    header("Location: listado.php");
} else {
    echo "Error al actualizar el usuario";
}