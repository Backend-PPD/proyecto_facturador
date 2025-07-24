<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";
$productoCtrl = new ProductoController();
$productos = $productoCtrl->obtener_listado();
?>
<div class="container mt-4">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0"><i class="fas fa-box-open me-2"></i>Listado de Productos</h5>
    </div>
    <div class="card-body">
      <a href="crear.php" class="btn btn-success mb-3"><i class="fas fa-plus me-2"></i>Nuevo Producto</a>
      <div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Descripción</th>
              <th>Unidad</th>
              <th>Stock</th>
              <th>Precio Unidad</th>
              <th>Costo</th>
              <th>Categoría</th>
              <th>Proveedor</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($productos as $producto) { ?>
            <tr>
              <td><?php echo $producto['idproducto']; ?></td>
              <td><?php echo $producto['nomproducto']; ?></td>
              <td><?php echo $producto['unidad']; ?></td>
              <td><?php echo $producto['stock']; ?></td>
              <td><?php echo $producto['preciounidad']; ?></td>
              <td><?php echo $producto['costo']; ?></td>
              <td><?php echo $producto['nomcategoria']; ?></td>
              <td><?php echo $producto['nomproveedor']; ?></td>
              <td>
                <a href="editar.php?id=<?php echo $producto['idproducto']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <a href="eliminar.php?id=<?php echo $producto['idproducto']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
