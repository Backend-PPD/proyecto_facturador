<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/ventaController.php";
$ventaCtrl = new VentaController();
$ventas = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fecha_inicio = $_POST['fecha_inicio'];
  $fecha_fin = $_POST['fecha_fin'];
  $ventas = $ventaCtrl->ventas_por_fecha($fecha_inicio, $fecha_fin);
}
?>
<div class="card">
  <div class="card-body">
    <h5>Reporte de Ventas por Fecha</h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Fecha Inicio:</label>
        <input type="date" class="form-control" name="fecha_inicio">
      </div>
      <div class="mb-3">
        <label class="form-label">Fecha Fin:</label>
        <input type="date" class="form-control" name="fecha_fin">
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