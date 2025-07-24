<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";
$clienteCtrl = new ClienteController();
$clientes = $clienteCtrl->obtener_listado();
$productoCtrl = new ProductoController();
$productos = $productoCtrl->obtener_listado();
?>
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Registrar Nueva Venta</h5>
    </div>
    <div class="card-body">
      <form action="grabar.php" method="POST">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Cliente:</label>
            <select class="form-select" name="idcliente" required>
              <?php foreach ($clientes as $cliente) { ?>
              <option value="<?php echo $cliente['idcliente']; ?>"><?php echo $cliente['nomcliente']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Tipo de Venta:</label>
            <select class="form-select" name="tipo" required>
              <option value="contado">Contado</option>
              <option value="credito">Crédito</option>
            </select>
          </div>
        </div>
        <div id="detalles">
          <div class="detalle row mb-3">
            <div class="col-md-4">
              <label class="form-label">Producto:</label>
              <select class="form-select producto" name="detalle[0][idproducto]" required>
                <?php foreach ($productos as $producto) { ?>
                <option value="<?php echo $producto['idproducto']; ?>" data-precio="<?php echo $producto['preciounidad']; ?>"><?php echo $producto['nomproducto']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Cantidad:</label>
              <input type="number" class="form-control cantidad" name="detalle[0][cantidad]" min="1" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Subtotal:</label>
              <input type="text" class="form-control subtotal" readonly>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button type="button" class="btn btn-danger remove-detalle"><i class="fas fa-minus"></i></button>
            </div>
          </div>
        </div>
        <button type="button" id="add-detalle" class="btn btn-primary mb-3"><i class="fas fa-plus me-2"></i>Agregar Producto</button>
        <div class="mb-3">
          <label class="form-label">Total:</label>
          <input type="text" class="form-control" id="total" name="total" readonly>
        </div>
        <input type="submit" class="btn btn-success" value="Registrar Venta">
      </form>
    </div>
  </div>
</div>
<script>
let index = 1;
document.getElementById('add-detalle').addEventListener('click', function() {
  let detalle = document.createElement('div');
  detalle.classList.add('detalle', 'row', 'mb-3');
  detalle.innerHTML = `
    <div class="col-md-4">
      <label class="form-label">Producto:</label>
      <select class="form-select producto" name="detalle[${index}][idproducto]" required>
        <?php foreach ($productos as $producto) { ?>
        <option value="<?php echo $producto['idproducto']; ?>" data-precio="<?php echo $producto['preciounidad']; ?>"><?php echo $producto['nomproducto']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-3">
      <label class="form-label">Cantidad:</label>
      <input type="number" class="form-control cantidad" name="detalle[${index}][cantidad]" min="1" required>
    </div>
    <div class="col-md-3">
      <label class="form-label">Subtotal:</label>
      <input type="text" class="form-control subtotal" readonly>
    </div>
    <div class="col-md-2 d-flex align-items-end">
      <button type="button" class="btn btn-danger remove-detalle"><i class="fas fa-minus"></i></button>
    </div>
  `;
  document.getElementById('detalles').appendChild(detalle);
  index++;
});
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('remove-detalle')) {
    e.target.closest('.detalle').remove();
  }
});
document.addEventListener('change', function(e) {
  if (e.target.classList.contains('cantidad') || e.target.classList.contains('producto')) {
    let row = e.target.closest('.detalle');
    let precio = row.querySelector('.producto').selectedOptions[0].dataset.precio;
    let cantidad = row.querySelector('.cantidad').value;
    row.querySelector('.subtotal').value = (precio * cantidad).toFixed(2);
    let total = 0;
    document.querySelectorAll('.subtotal').forEach(function(sub) {
      total += parseFloat(sub.value) || 0;
    });
    document.getElementById('total').value = total.toFixed(2);
  }
});
</script>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>