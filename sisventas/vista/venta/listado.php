<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/ventaController.php";
$ventaCtrl = new VentaController();
$ventas = $ventaCtrl->obtener_listado();
?>
<div class="card">
  <div class="card-body">
    <h5>Listado de Ventas</h5>
    <a href="registrar.php" class="btn btn-primary mb-3">Nueva Venta</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID Venta</th>
          <th>Fecha</th>
          <th>ID Cliente</th>
          <th>Total</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ventas as $venta) { ?>
        <tr>
          <td><?php echo $venta['idventa']; ?></td>
          <td><?php echo $venta['fecha']; ?></td>
          <td><?php echo $venta['idcliente']; ?></td>
          <td><?php echo $venta['total']; ?></td>
          <td><?php echo $venta['tipo']; ?></td>
          <td>
            <a href="ver.php?id=<?php echo $venta['idventa']; ?>" class="btn btn-info btn-sm">Ver</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>