<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/cliente.php";

class ClienteController{

    public function obtener_listado(){

        $listado = new Cliente();
        $res = $listado->listado();
        return $res;

    }

    
    public function busca_cliente($id){
        $ocliente = new Cliente();
        $res = $ocliente->buscar($id);
        return $res;
    }

}   