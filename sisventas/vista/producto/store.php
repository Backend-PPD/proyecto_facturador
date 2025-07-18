<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php"; 

$id = $_POST["codigo"];
$nom = strtoupper($_POST["txtnom"]);
$und = strtoupper($_POST["txtund"]);
$stk = $_POST["txtstk"];
$pre = $_POST["txtpre"];
$cos = $_POST["txtcos"];

$producto = new ProductoController();
$res = $producto->actualiza_producto($id, $nom,$und,$stk,$pre,$cos);
if ($res) {
    echo "Producto actualizado exitosamente";
    header("Location: http://localhost/sisventas/vista/producto/listado.php");
}else
    echo "Problemas al agregar registro";
