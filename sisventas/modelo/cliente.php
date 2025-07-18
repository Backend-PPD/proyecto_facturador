<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Cliente {

    private $idcliente;
    private $nombre;
    private $ruc;
    private $direccion;
    private $telefono;
    private $email;
    private $con;

    public function __construct(){
        $cnx = new DBConection();
        $this->con = $cnx->conectar();
    }

    public function listado(){
        $sql = "select * from clientes";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultados;
    }

    public function buscar($id){
 
            $sql = "select * from productos where idCliente = :codigo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':codigo', $id);
            $stmt->execute();
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultados;
       

    }

}