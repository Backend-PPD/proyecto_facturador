<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
$id = $_POST["txtidcliente"];
$nom = strtoupper($_POST["txtnomcliente"]);
$ruc = strtoupper($_POST["txtruccliente"]);
$dir = strtoupper($_POST["txtdircliente"]);
$tel = $_POST["txttelcliente"];
$email = $_POST["txtemailcliente"];
$cliente = new ClienteController();
$res = $cliente->actualizar_cliente($id, $nom, $ruc, $dir, $tel, $email);
if ($res) {
    echo "Cliente actualizado exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al actualizar registro";
}