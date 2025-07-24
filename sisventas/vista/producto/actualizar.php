<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";

$id = $_POST["txtidproducto"];
$nom = $_POST["txtnomprodu"];
$und = $_POST["txtunimed"];
$stock = $_POST["txtstock"];
$precio = $_POST["txtpreuni"];
$costo = $_POST["txtcosuni"];
$idcat = $_POST["idcategoria"];
$idprov = $_POST["idproveedor"];

$productoCtrl = new ProductoController();
$res = $productoCtrl->actualizar_producto($id, $nom, $und, $stock, $precio, $costo, $idcat, $idprov);

if ($res) {
    echo "Producto actualizado exitosamente";
    header("Location: listado.php");
} else {
    echo "Problemas al actualizar registro";
}
?>