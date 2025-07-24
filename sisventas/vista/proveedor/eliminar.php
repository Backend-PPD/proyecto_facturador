<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/proveedorController.php";
$id = $_GET['id'];
$proveedor = new ProveedorController();
$res = $proveedor->eliminar_proveedor($id);
if ($res) {
    echo "Proveedor eliminado exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al eliminar registro";
}