<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Cliente {

    private $idcliente;
    private $nomcliente;
    private $ruccliente;
    private $dircliente;
    private $telcliente;
    private $emailcliente;
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
        $sql = "select * from clientes where idcliente = :idcliente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcliente', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "insert into clientes (nomcliente, ruc, direccion, telefono, email)
                values (:nomcliente, :ruccliente, :dircliente, :telcliente, :emailcliente)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nomcliente', $this->nomcliente);
        $stmt->bindParam(':ruccliente', $this->ruccliente);
        $stmt->bindParam(':dircliente', $this->dircliente);
        $stmt->bindParam(':telcliente', $this->telcliente);
        $stmt->bindParam(':emailcliente', $this->emailcliente);
        if ($stmt->execute()){
            return true;
        } else
            return false;
    }

    public function update(){
        $sql = "update clientes set nomcliente=:nomcliente, ruc=:ruccliente, direccion=:dircliente, telefono=:telcliente, email=:emailcliente where idcliente=:idcliente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcliente', $this->idcliente);
        $stmt->bindParam(':nomcliente', $this->nomcliente);
        $stmt->bindParam(':ruccliente', $this->ruccliente);
        $stmt->bindParam(':dircliente', $this->dircliente);
        $stmt->bindParam(':telcliente', $this->telcliente);
        $stmt->bindParam(':emailcliente', $this->emailcliente);
        return $stmt->execute();
    }

    public function delete(){
        $sql = "delete from clientes where idcliente=:idcliente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcliente', $this->idcliente);
        return $stmt->execute();
    }

    public function setIdcliente($id){ $this->idcliente = $id; }
    public function setNomcliente($nom){ $this->nomcliente = $nom; }
    public function setRuccliente($ruc){ $this->ruccliente = $ruc; }
    public function setDircliente($dir){ $this->dircliente = $dir; }
    public function setTelcliente($tel){ $this->telcliente = $tel; }
    public function setEmailcliente($email){ $this->emailcliente = $email; }
    public function getIdcliente(){ return $this->idcliente; }
    public function getNomcliente(){ return $this->nomcliente; }
    public function getRuccliente(){ return $this->ruccliente; }
    public function getDircliente(){ return $this->dircliente; }
    public function getTelcliente(){ return $this->telcliente; }
    public function getEmailcliente(){ return $this->emailcliente; }
}