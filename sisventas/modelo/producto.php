<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Producto {

    private $idproducto;
    private $nomprodu;
    private $unimed;
    private $stock;
    private $preuni;
    private $cosuni;
    private $idcategoria;
    private $idproveedor;
    private $con;

    public function __construct(){
        $cnx = new DBConection();
        $this->con = $cnx->conectar();
    }

    public function listado(){
        $sql = "select p.*, c.nomcategoria, pr.nomproveedor from productos p left join categorias c on p.idcategoria = c.idcategoria left join proveedores pr on p.idproveedor = pr.idproveedor";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscar($id){
        $sql = "select * from productos where idproducto = :idproducto";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproducto', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "insert into productos (nomproducto, unidad, stock, preciounidad, costo, idcategoria, idproveedor)
                values (:nompro, :unimed, :stock, :preuni, :cosuni, :idcategoria, :idproveedor)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nompro', $this->nomprodu);
        $stmt->bindParam(':unimed', $this->unimed);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':preuni', $this->preuni);
        $stmt->bindParam(':cosuni', $this->cosuni);
        $stmt->bindParam(':idcategoria', $this->idcategoria);
        $stmt->bindParam(':idproveedor', $this->idproveedor);
        if ($stmt->execute()){
            return true;
        } else
            return false;
    }

    public function update(){
        $sql = "update productos set nomproducto=:nompro, unidad=:unimed, stock=:stock, preciounidad=:preuni, costo=:cosuni, idcategoria=:idcategoria, idproveedor=:idproveedor where idproducto=:idproducto";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproducto', $this->idproducto);
        $stmt->bindParam(':nompro', $this->nomprodu);
        $stmt->bindParam(':unimed', $this->unimed);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':preuni', $this->preuni);
        $stmt->bindParam(':cosuni', $this->cosuni);
        $stmt->bindParam(':idcategoria', $this->idcategoria);
        $stmt->bindParam(':idproveedor', $this->idproveedor);
        return $stmt->execute();
    }

    public function delete(){
        $sql = "delete from productos where idproducto=:idproducto";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproducto', $this->idproducto);
        return $stmt->execute();
    }

    public function setIdproducto($id){ $this->idproducto = $id; }
    public function setNomprodu($nom){ $this->nomprodu = $nom; }
    public function setUnimed($und){ $this->unimed = $und; }
    public function setStock($stk){ $this->stock = $stk; }
    public function setPreuni($pre){ $this->preuni = $pre; }
    public function setCosuni($cos){ $this->cosuni = $cos; }
    public function setIdcategoria($idcat){ $this->idcategoria = $idcat; }
    public function setIdproveedor($idprov){ $this->idproveedor = $idprov; }
    public function getIdproducto(){ return $this->idproducto; }
    public function getNomprodu(){ return $this->nomprodu; }
    public function getUnimed(){ return $this->unimed; }
    public function getStock(){ return $this->stock; }
    public function getPreuni(){ return $this->preuni; }
    public function getCosuni(){ return $this->cosuni; }
    public function getIdcategoria(){ return $this->idcategoria; }
    public function getIdproveedor(){ return $this->idproveedor; }
}