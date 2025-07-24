<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/proveedor.php";

class ProveedorController {

    public function obtener_listado(){
        $proveedor = new Proveedor();
        return $proveedor->listado();
    }

    public function buscar_proveedor($id){
        $proveedor = new Proveedor();
        return $proveedor->buscar($id);
    }

    public function inserta_proveedor($id, $nom, $ruc, $dir, $tel, $email){
        $proveedor = new Proveedor();
        $proveedor->setIdproveedor($id);
        $proveedor->setNomproveedor($nom);
        $proveedor->setRucproveedor($ruc);
        $proveedor->setDirproveedor($dir);
        $proveedor->setTelproveedor($tel);
        $proveedor->setEmailproveedor($email);
        return $proveedor->create();
    }

    public function actualizar_proveedor($id, $nom, $ruc, $dir, $tel, $email){
        $proveedor = new Proveedor();
        $proveedor->setIdproveedor($id);
        $proveedor->setNomproveedor($nom);
        $proveedor->setRucproveedor($ruc);
        $proveedor->setDirproveedor($dir);
        $proveedor->setTelproveedor($tel);
        $proveedor->setEmailproveedor($email);
        return $proveedor->update();
    }

    public function eliminar_proveedor($id){
        $proveedor = new Proveedor();
        $proveedor->setIdproveedor($id);
        return $proveedor->delete();
    }
}