<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/ventaController.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";
$idventa = $_GET['id'];
$ventaCtrl = new VentaController();
$venta = $ventaCtrl->buscar_venta($idventa);
// Obtener detalles
$con = (new DBConection())->conectar();
$sql = "select dv.*, p.nomproducto from detalle_ventas dv join productos p on dv.idproducto = p.idproducto where dv.idventa = :idventa";
$stmt = $con->prepare($sql);
$stmt->bindParam(':idventa', $idventa);
$stmt->execute();
$detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);
$clienteCtrl = new ClienteController();
$cliente = $clienteCtrl->buscar_cliente($venta['idcliente']);
?>
<div class="card">
  <div class="card-body">
    <h5>Detalles de Venta #<?php echo $venta['idventa']; ?></h5>
    <p>Fecha: <?php echo $venta['fecha']; ?></p>
    <p>Cliente: <?php echo is_array($cliente) ? $cliente['nomcliente'] : 'Cliente no encontrado'; ?></p>
    <p>Total: <?php echo $venta['total']; ?></p>
    <p>Tipo: <?php echo $venta['tipo']; ?></p>
    <h6>Detalles:</h6>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($detalles as $detalle) { ?>
        <tr>
          <td><?php echo $detalle['nomproducto']; ?></td>
          <td><?php echo $detalle['cantidad']; ?></td>
          <td><?php echo $detalle['precio']; ?></td>
          <td><?php echo $detalle['cantidad'] * $detalle['precio']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="listado.php" class="btn btn-secondary">Volver</a>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>