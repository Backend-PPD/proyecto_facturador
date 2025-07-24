<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Proveedor {

    private $idproveedor;
    private $nomproveedor;
    private $rucproveedor;
    private $dirproveedor;
    private $telproveedor;
    private $emailproveedor;
    private $con;

    public function __construct(){
        $cnx = new DBConection();
        $this->con = $cnx->conectar();
    }

    public function listado(){
        $sql = "select * from proveedores";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscar($id){
        $sql = "select * from proveedores where idproveedor = :idproveedor";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproveedor', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "insert into proveedores (idproveedor, nomproveedor, ruc, direccion, telefono, email)
                values (:idproveedor, :nomproveedor, :rucproveedor, :dirproveedor, :telproveedor, :emailproveedor)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproveedor', $this->idproveedor);
        $stmt->bindParam(':nomproveedor', $this->nomproveedor);
        $stmt->bindParam(':rucproveedor', $this->rucproveedor);
        $stmt->bindParam(':dirproveedor', $this->dirproveedor);
        $stmt->bindParam(':telproveedor', $this->telproveedor);
        $stmt->bindParam(':emailproveedor', $this->emailproveedor);
        if ($stmt->execute()){
            return true;
        } else
            return false;
    }

    public function update(){
        $sql = "update proveedores set nomproveedor=:nomproveedor, ruc=:rucproveedor, direccion=:dirproveedor, telefono=:telproveedor, email=:emailproveedor where idproveedor=:idproveedor";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproveedor', $this->idproveedor);
        $stmt->bindParam(':nomproveedor', $this->nomproveedor);
        $stmt->bindParam(':rucproveedor', $this->rucproveedor);
        $stmt->bindParam(':dirproveedor', $this->dirproveedor);
        $stmt->bindParam(':telproveedor', $this->telproveedor);
        $stmt->bindParam(':emailproveedor', $this->emailproveedor);
        return $stmt->execute();
    }

    public function delete(){
        $sql = "delete from proveedores where idproveedor=:idproveedor";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproveedor', $this->idproveedor);
        return $stmt->execute();
    }

    public function setIdproveedor($id){ $this->idproveedor = $id; }
    public function setNomproveedor($nom){ $this->nomproveedor = $nom; }
    public function setRucproveedor($ruc){ $this->rucproveedor = $ruc; }
    public function setDirproveedor($dir){ $this->dirproveedor = $dir; }
    public function setTelproveedor($tel){ $this->telproveedor = $tel; }
    public function setEmailproveedor($email){ $this->emailproveedor = $email; }
    public function getIdproveedor(){ return $this->idproveedor; }
    public function getNomproveedor(){ return $this->nomproveedor; }
    public function getRucproveedor(){ return $this->rucproveedor; }
    public function getDirproveedor(){ return $this->dirproveedor; }
    public function getTelproveedor(){ return $this->telproveedor; }
    public function getEmailproveedor(){ return $this->emailproveedor; }
}