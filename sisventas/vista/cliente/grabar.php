<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
$id = strtoupper($_POST["txtidcliente"]);
$nom = strtoupper($_POST["txtnomcliente"]);
$ruc = strtoupper($_POST["txtruccliente"]);
$dir = strtoupper($_POST["txtdircliente"]);
$tel = $_POST["txttelcliente"];
$email = $_POST["txtemailcliente"];
$cliente = new ClienteController();
$res = $cliente->inserta_cliente($id, $nom, $ruc, $dir, $tel, $email);
if ($res) {
    echo "Cliente agregado exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al agregar registro";
}