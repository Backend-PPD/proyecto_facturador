<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/ventaController.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";
$ventaCtrl = new VentaController();
$productoCtrl = new ProductoController();
$productos = $productoCtrl->obtener_listado();
$ventas = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idproducto = $_POST['idproducto'];
  $ventas = $ventaCtrl->ventas_por_producto($idproducto);
}
?>
<div class="card">
  <div class="card-body">
    <h5>Reporte de Ventas por Producto</h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Producto:</label>
        <select class="form-select" name="idproducto">
          <?php foreach ($productos as $producto) { ?>
          <option value="<?php echo $producto['idproducto']; ?>"><?php echo $producto['nomproducto']; ?></option>
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
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ventas as $venta) { ?>
        <tr>
          <td><?php echo $venta['idventa']; ?></td>
          <td><?php echo $venta['fecha']; ?></td>
          <td><?php echo $venta['nomcliente']; ?></td>
          <td><?php echo $venta['nomproducto']; ?></td>
          <td><?php echo $venta['cantidad']; ?></td>
          <td><?php echo $venta['precio']; ?></td>
          <td><?php echo $venta['cantidad'] * $venta['precio']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } ?>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>