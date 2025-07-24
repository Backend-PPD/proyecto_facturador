<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";
$id = $_POST["txtidcategoria"];
$nom = strtoupper($_POST["txtnomcategoria"]);
$categoria = new CategoriaController();
$res = $categoria->actualizar_categoria($id, $nom);
if ($res) {
    echo "Categoría actualizada exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al actualizar registro";
}