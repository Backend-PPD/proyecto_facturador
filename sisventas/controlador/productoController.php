<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/producto.php";

class ProductoController {

    public function obtener_listado(){
        $producto = new Producto();
        return $producto->listado();
    }

    public function buscar_producto($id){
        $producto = new Producto();
        return $producto->buscar($id);
    }

    public function inserta_producto($nom, $und, $stock, $precio, $costo, $idcat, $idprov){
        $producto = new Producto();
        $producto->setNomprodu($nom);
        $producto->setUnimed($und);
        $producto->setStock($stock);
        $producto->setPreuni($precio);
        $producto->setCosuni($costo);
        $producto->setIdcategoria($idcat);
        $producto->setIdproveedor($idprov);
        return $producto->create();
    }

    public function actualizar_producto($id, $nom, $und, $stock, $precio, $costo, $idcat, $idprov){
        $producto = new Producto();
        $producto->setIdproducto($id);
        $producto->setNomprodu($nom);
        $producto->setUnimed($und);
        $producto->setStock($stock);
        $producto->setPreuni($precio);
        $producto->setCosuni($costo);
        $producto->setIdcategoria($idcat);
        $producto->setIdproveedor($idprov);
        return $producto->update();
    }

    public function eliminar_producto($id){
        $producto = new Producto();
        $producto->setIdproducto($id);
        return $producto->delete();
    }
}