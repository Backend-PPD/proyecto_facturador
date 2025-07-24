<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/proveedorController.php";
$id = $_POST["txtidproveedor"];
$nom = strtoupper($_POST["txtnomproveedor"]);
$ruc = strtoupper($_POST["txtrucproveedor"]);
$dir = strtoupper($_POST["txtdirproveedor"]);
$tel = $_POST["txttelproveedor"];
$email = $_POST["txtemailproveedor"];
$proveedor = new ProveedorController();
$res = $proveedor->actualizar_proveedor($id, $nom, $ruc, $dir, $tel, $email);
if ($res) {
    echo "Proveedor actualizado exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al actualizar registro";
}