<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
$id = $_GET['id'];
$cliente = new ClienteController();
$res = $cliente->eliminar_cliente($id);
if ($res) {
    echo "Cliente eliminado exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al eliminar registro";
}