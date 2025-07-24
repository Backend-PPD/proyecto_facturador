<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/proveedorController.php";
$proveedorCtrl = new ProveedorController();
$proveedores = $proveedorCtrl->obtener_listado();
?>
<div class="card">
  <div class="card-body">
    <h5>Listado de Proveedores</h5>
    <a href="crear.php" class="btn btn-primary">Nuevo Proveedor</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>RUC</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Email</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($proveedores as $proveedor) { ?>
        <tr>
          <td><?php echo $proveedor['idproveedor']; ?></td>
          <td><?php echo $proveedor['nomproveedor']; ?></td>
          <td><?php echo $proveedor['ruc']; ?></td>
          <td><?php echo $proveedor['direccion']; ?></td>
          <td><?php echo $proveedor['telefono']; ?></td>
          <td><?php echo $proveedor['email']; ?></td>
          <td>
            <a href="editar.php?id=<?php echo $proveedor['idproveedor']; ?>" class="btn btn-warning">Editar</a>
            <a href="eliminar.php?id=<?php echo $proveedor['idproveedor']; ?>" class="btn btn-danger">Eliminar</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>