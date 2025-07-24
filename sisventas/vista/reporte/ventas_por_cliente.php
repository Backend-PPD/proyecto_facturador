<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/ventaController.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
$ventaCtrl = new VentaController();
$clienteCtrl = new ClienteController();
$clientes = $clienteCtrl->obtener_listado();
$ventas = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idcliente = $_POST['idcliente'];
  $ventas = $ventaCtrl->ventas_por_cliente($idcliente);
}
?>
<div class="card">
  <div class="card-body">
    <h5>Reporte de Ventas por Cliente</h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Cliente:</label>
        <select class="form-select" name="idcliente">
          <?php foreach ($clientes as $cliente) { ?>
          <option value="<?php echo $cliente['idcliente']; ?>"><?php echo $cliente['nomcliente']; ?></option>
          <?php } ?>
        </select>
      </div>
      <input type="submit" class="btn btn-primary" value="Generar Reporte">
    </form>
    <?php if (!empty($ventas)) { ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID Venta</th>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Total</th>
          <th>Tipo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ventas as $venta) { ?>
        <tr>
          <td><?php echo $venta['idventa']; ?></td>
          <td><?php echo $venta['fecha']; ?></td>
          <td><?php echo $venta['nomcliente']; ?></td>
          <td><?php echo $venta['total']; ?></td>
          <td><?php echo $venta['tipo']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } ?>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>