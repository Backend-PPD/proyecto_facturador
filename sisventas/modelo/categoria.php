<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Categoria {

    private $idcategoria;
    private $nomcategoria;
    private $con;

    public function __construct(){
        $cnx = new DBConection();
        $this->con = $cnx->conectar();
    }

    public function listado(){
        $sql = "select * from categorias";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscar($id){
        $sql = "select * from categorias where idcategoria = :idcategoria";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcategoria', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "insert into categorias (nomcategoria) values (:nomcategoria)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nomcategoria', $this->nomcategoria);
        if ($stmt->execute()){
            return true;
        } else
            return false;
    }

    public function update(){
        $sql = "update categorias set nomcategoria=:nomcategoria where idcategoria=:idcategoria";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcategoria', $this->idcategoria);
        $stmt->bindParam(':nomcategoria', $this->nomcategoria);
        return $stmt->execute();
    }

    public function delete(){
        $sql = "delete from categorias where idcategoria=:idcategoria";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcategoria', $this->idcategoria);
        return $stmt->execute();
    }

    public function setIdcategoria($id){ $this->idcategoria = $id; }
    public function setNomcategoria($nom){ $this->nomcategoria = $nom; }
    public function getIdcategoria(){ return $this->idcategoria; }
    public function getNomcategoria(){ return $this->nomcategoria; }
}