<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/categoria.php";

class CategoriaController {

    public function obtener_listado(){
        $categoria = new Categoria();
        return $categoria->listado();
    }

    public function buscar_categoria($id){
        $categoria = new Categoria();
        return $categoria->buscar($id);
    }

    public function inserta_categoria($id, $nom){
        $categoria = new Categoria();
        $categoria->setIdcategoria($id);
        $categoria->setNomcategoria($nom);
        return $categoria->create();
    }

    public function actualizar_categoria($id, $nom){
        $categoria = new Categoria();
        $categoria->setIdcategoria($id);
        $categoria->setNomcategoria($nom);
        return $categoria->update();
    }

    public function eliminar_categoria($id){
        $categoria = new Categoria();
        $categoria->setIdcategoria($id);
        return $categoria->delete();
    }
}