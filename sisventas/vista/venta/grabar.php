<?php
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/ventaController.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";
$fecha = date('Y-m-d');
$idcliente = $_POST['idcliente'];
$tipo = $_POST['tipo'];
$total = 0;
$detalles = [];
$productoCtrl = new ProductoController();
foreach ($_POST['detalle'] as $det) {
  $producto = $productoCtrl->buscar_producto($det['idproducto']);
  $precio = $producto['preciounidad'];
  $subtotal = $det['cantidad'] * $precio;
  $detalles[] = ['idproducto' => $det['idproducto'], 'cantidad' => $det['cantidad'], 'precio' => $precio];
  $total += $subtotal;
}
$ventaCtrl = new VentaController();
$res = $ventaCtrl->registrar_venta($fecha, $idcliente, $total, $tipo, $detalles);
if ($res) {
    echo "Venta registrada exitosamente";
    header("Location: ../venta/registrar.php"); // Redirigir de vuelta o a listado
} else {
    echo "Problemas al registrar la venta";
}