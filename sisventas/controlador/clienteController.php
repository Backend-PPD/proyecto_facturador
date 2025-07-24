<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/cliente.php";

class ClienteController{

    public function obtener_listado(){
        $listado = new Cliente();
        $res = $listado->listado();
        return $res;
    }

    public function inserta_cliente($id, $nom, $ruc, $dir, $tel, $email){
        $ocliente = new Cliente();
        $ocliente->setIdcliente($id);
        $ocliente->setNomcliente($nom);
        $ocliente->setRuccliente($ruc);
        $ocliente->setDircliente($dir);
        $ocliente->setTelcliente($tel);
        $ocliente->setEmailcliente($email);
        $res = $ocliente->create();
        return $res ? true : false;
    }

    public function actualizar_cliente($id, $nom, $ruc, $dir, $tel, $email){
        $ocliente = new Cliente();
        $ocliente->setIdcliente($id);
        $ocliente->setNomcliente($nom);
        $ocliente->setRuccliente($ruc);
        $ocliente->setDircliente($dir);
        $ocliente->setTelcliente($tel);
        $ocliente->setEmailcliente($email);
        return $ocliente->update();
    }

    public function eliminar_cliente($id){
        $ocliente = new Cliente();
        $ocliente->setIdcliente($id);
        return $ocliente->delete();
    }

    public function buscar_cliente($id){
        $ocliente = new Cliente();
        return $ocliente->buscar($id);
    }
}