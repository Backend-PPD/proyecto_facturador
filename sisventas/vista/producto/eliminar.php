<?php

$codigo = $_GET["id"];

include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";

$producto = new ProductoController();
$res = $producto->elimina_producto($codigo);

header("Location: http://localhost/sisventas/vista/producto/listado.php");
