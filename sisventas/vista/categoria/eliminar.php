<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";
$id = $_GET['id'];
$categoria = new CategoriaController();
$res = $categoria->eliminar_categoria($id);
if ($res) {
    echo "Categoría eliminada exitosamente";
    header("Location: listado.php");
}else{
    echo "Problemas al eliminar registro";
}