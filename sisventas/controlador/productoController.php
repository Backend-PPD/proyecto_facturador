<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/producto.php";

class ProductoController{

    public function obtener_listado(){

        $listado = new Producto();
        $res = $listado->listado();
        return $res;

    }

    public function inserta_producto($nom, $und,$stock, $precio, $costo){
        $oprodu = new Producto();
        $oprodu->setNomprodu($nom);
        $oprodu->setUnimed($und);
        $oprodu->setStock($stock);
        $oprodu->setPreuni($precio);
        $oprodu->setCosuni($costo);

        $res =$oprodu->create();
        if ($res){
            return true;
        }
        else    
            return false;

    }

    public function busca_producto($id){
        $oprodu = new Producto();
        $res = $oprodu->buscar($id);
        return $res;
    }

    public function actualiza_producto($id,$nom, $und,$stock, $precio, $costo){
        $oprodu = new Producto();
        $oprodu->setIdproducto($id);
        $oprodu->setNomprodu($nom);
        $oprodu->setUnimed($und);
        $oprodu->setStock($stock);
        $oprodu->setPreuni($precio);
        $oprodu->setCosuni($costo);

        $res =$oprodu->update();
        if ($res){
            return true;
        }
        else    
            return false;


    }

    public function elimina_producto($id){
        $oprodu = new Producto();
        $res = $oprodu->delete($id);
        if ($res)
            echo "Registro Eliminado satisfactoriamente..";
        else        
            echo "Problemas al eliminar el Registro";
    }


}