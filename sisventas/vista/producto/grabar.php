<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php"; 

$nom = strtoupper($_POST["txtnomprodu"]);
$und = strtoupper($_POST["txtunimed"]);
$stk = $_POST["txtstock"];
$pre = $_POST["txtpreuni"];
$cos = $_POST["txtcosuni"];

$producto = new ProductoController();
$res = $producto->inserta_producto($nom,$und,$stk,$pre,$cos);
if ($res) {
    echo "Producto agregado exitosamente";
    header("Location: http://localhost/sisventas/vista/producto/listado.php");
}else
    echo "Problemas al agregar registro";



