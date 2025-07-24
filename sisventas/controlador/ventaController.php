<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/venta.php";

class VentaController {

    public function obtener_listado(){
        $venta = new Venta();
        return $venta->listado();
    }

    public function buscar_venta($id){
        $venta = new Venta();
        return $venta->buscar($id);
    }

    public function registrar_venta($fecha, $idcliente, $total, $tipo, $detalles){
        $venta = new Venta();
        $venta->setFecha($fecha);
        $venta->setIdcliente($idcliente);
        $venta->setTotal($total);
        $venta->setTipo($tipo);
        return $venta->create($detalles);
    }

    public function ventas_por_fecha($fecha_inicio, $fecha_fin){
        $venta = new Venta();
        return $venta->ventas_por_fecha($fecha_inicio, $fecha_fin);
    }

    public function ventas_por_cliente($idcliente){
        $venta = new Venta();
        return $venta->ventas_por_cliente($idcliente);
    }

    public function ventas_por_producto($idproducto){
        $venta = new Venta();
        return $venta->ventas_por_producto($idproducto);
    }

    // Add other methods for reports and queries later
}