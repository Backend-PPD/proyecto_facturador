<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";
$id = $_POST["txtidcategoria"];
$nom = strtoupper($_POST["txtnomcategoria"]);
$categoria = new CategoriaController();
$res = $categoria->inserta_categoria($id, $nom);
if ($res) {
    echo "Categoría grabada exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al grabar registro";
}