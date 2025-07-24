<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/usuarioController.php";

$id = $_GET['id'];

$usuarioCtrl = new UsuarioController();
$res = $usuarioCtrl->eliminar_usuario($id);

if ($res) {
    header("Location: listado.php");
} else {
    echo "Error al eliminar el usuario";
}