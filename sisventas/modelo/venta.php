<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Venta {

    private $idventa;
    private $fecha;
    private $idcliente;
    private $total;
    private $tipo; // 'contado' or 'credito'
    private $con;

    public function __construct(){
        $cnx = new DBConection();
        $this->con = $cnx->conectar();
    }

    public function listado(){
        $sql = "select * from ventas";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id){
        $sql = "select * from ventas where idventa = :idventa";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idventa', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ventas_por_fecha($fecha_inicio, $fecha_fin){
        $sql = "select v.*, c.nomcliente from ventas v join clientes c on v.idcliente = c.idcliente where v.fecha between :fecha_inicio and :fecha_fin";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ventas_por_cliente($idcliente){
        $sql = "select v.*, c.nomcliente from ventas v join clientes c on v.idcliente = c.idcliente where v.idcliente = :idcliente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idcliente', $idcliente);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ventas_por_producto($idproducto){
        $sql = "select v.*, c.nomcliente, p.nomproducto, dv.cantidad, dv.precio from ventas v join detalle_ventas dv on v.idventa = dv.idventa join productos p on dv.idproducto = p.idproducto join clientes c on v.idcliente = c.idcliente where dv.idproducto = :idproducto";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idproducto', $idproducto);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($detalles){
        try {
            $this->con->beginTransaction();
            $sql = "insert into ventas (fecha, idcliente, total, tipo) values (:fecha, :idcliente, :total, :tipo)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':fecha', $this->fecha);
            $stmt->bindParam(':idcliente', $this->idcliente);
            $stmt->bindParam(':total', $this->total);
            $stmt->bindParam(':tipo', $this->tipo);
            $stmt->execute();
            $this->idventa = $this->con->lastInsertId();

            foreach ($detalles as $detalle) {
                $sql_det = "insert into detalle_ventas (idventa, idproducto, cantidad, precio) values (:idventa, :idproducto, :cantidad, :precio)";
                $stmt_det = $this->con->prepare($sql_det);
                $stmt_det->bindParam(':idventa', $this->idventa);
                $stmt_det->bindParam(':idproducto', $detalle['idproducto']);
                $stmt_det->bindParam(':cantidad', $detalle['cantidad']);
                $stmt_det->bindParam(':precio', $detalle['precio']);
                $stmt_det->execute();

                // Update stock
                $sql_stock = "update productos set stock = stock - :cantidad where idproducto = :idproducto";
                $stmt_stock = $this->con->prepare($sql_stock);
                $stmt_stock->bindParam(':cantidad', $detalle['cantidad']);
                $stmt_stock->bindParam(':idproducto', $detalle['idproducto']);
                $stmt_stock->execute();
            }

            $this->con->commit();
            return true;
        } catch (Exception $e) {
            $this->con->rollback();
            return false;
        }
    }

    // Add other methods as needed

    public function setIdventa($id){ $this->idventa = $id; }
    public function setFecha($fecha){ $this->fecha = $fecha; }
    public function setIdcliente($idcli){ $this->idcliente = $idcli; }
    public function setTotal($total){ $this->total = $total; }
    public function setTipo($tipo){ $this->tipo = $tipo; }
    public function getIdventa(){ return $this->idventa; }
    public function getFecha(){ return $this->fecha; }
    public function getIdcliente(){ return $this->idcliente; }
    public function getTotal(){ return $this->total; }
    public function getTipo(){ return $this->tipo; }
}