<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/proveedorController.php";

$id = $_GET['id'];
$productoCtrl = new ProductoController();
$producto = $productoCtrl->buscar_producto($id);
?>
<div class="card">
  <div class="card-body">
    <h5>Editar Producto</h5>
    <form method="POST" name="fproducto" action="actualizar.php">
      <input type="hidden" name="txtidproducto" value="<?php echo isset($producto['idproducto']) ? $producto['idproducto'] : ''; ?>">
      <div class="mb-3">
        <label class="form-label">Descripción:</label>
        <input type="text" class="form-control" name="txtnomprodu" value="<?php echo isset($producto['nomproducto']) ? $producto['nomproducto'] : ''; ?>" placeholder="Nombre Producto">
      </div>
      <div class="mb-3">
        <label class="form-label">Unidad Medida:</label>
        <input type="text" class="form-control" name="txtunimed" value="<?php echo isset($producto['unidad']) ? $producto['unidad'] : ''; ?>" placeholder="Unidad Medida">
      </div>
      <div class="mb-3">
        <label class="form-label">Stock:</label>
        <input type="text" class="form-control" name="txtstock" value="<?php echo isset($producto['stock']) ? $producto['stock'] : ''; ?>" placeholder="Stock">
      </div>
      <div class="mb-3">
        <label class="form-label">Precio Unitario:</label>
        <input type="text" class="form-control" name="txtpreuni" value="<?php echo isset($producto['preciounidad']) ? $producto['preciounidad'] : ''; ?>" placeholder="Precio Unitario">
      </div>
      <div class="mb-3">
        <label class="form-label">Costo Unitario:</label>
        <input type="text" class="form-control" name="txtcosuni" value="<?php echo isset($producto['costo']) ? $producto['costo'] : ''; ?>" placeholder="Costo Unitario">
      </div>
      <div class="mb-3">
        <label class="form-label">Categoría:</label>
        <select name="idcategoria" class="form-control">
          <?php
          $catController = new CategoriaController();
          $categorias = $catController->obtener_listado();
          foreach($categorias as $cat){
            $selected = (isset($producto['idcategoria']) && $producto['idcategoria'] == $cat['idcategoria']) ? 'selected' : '';
            echo '<option value="' . $cat['idcategoria'] . '" ' . $selected . '>' . $cat['nomcategoria'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Proveedor:</label>
        <select name="idproveedor" class="form-control">
          <?php
          $provController = new ProveedorController();
          $proveedores = $provController->obtener_listado();
          foreach($proveedores as $prov){
            $selected = (isset($producto['idproveedor']) && $producto['idproveedor'] == $prov['idproveedor']) ? 'selected' : '';
            echo '<option value="' . $prov['idproveedor'] . '" ' . $selected . '>' . $prov['nomproveedor'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div>
        <input type="submit" class="form-button" value="Actualizar">
      </div>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>