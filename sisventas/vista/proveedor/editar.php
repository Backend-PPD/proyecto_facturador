<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/proveedorController.php";

$id = $_GET['id'];
$proveedorCtrl = new ProveedorController();
$proveedor = $proveedorCtrl->buscar_proveedor($id);
?>
<div class="card">
  <div class="card-body">
    <h5>Editar Proveedor</h5>
    <form method="POST" name="fproveedor" action="actualizar.php">
      <input type="hidden" name="txtidproveedor" value="<?php echo isset($proveedor['idproveedor']) ? $proveedor['idproveedor'] : ''; ?>">
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="txtnomproveedor" value="<?php echo isset($proveedor['nomproveedor']) ? $proveedor['nomproveedor'] : ''; ?>" placeholder="Nombre Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">RUC:</label>
        <input type="text" class="form-control" name="txtrucproveedor" value="<?php echo isset($proveedor['rucproveedor']) ? $proveedor['rucproveedor'] : ''; ?>" placeholder="RUC Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Dirección:</label>
        <input type="text" class="form-control" name="txtdirproveedor" value="<?php echo isset($proveedor['dirproveedor']) ? $proveedor['dirproveedor'] : ''; ?>" placeholder="Dirección Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Teléfono:</label>
        <input type="text" class="form-control" name="txttelproveedor" value="<?php echo isset($proveedor['telproveedor']) ? $proveedor['telproveedor'] : ''; ?>" placeholder="Teléfono Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" class="form-control" name="txtemailproveedor" value="<?php echo isset($proveedor['emailproveedor']) ? $proveedor['emailproveedor'] : ''; ?>" placeholder="Email Proveedor">
      </div>
      <div>
        <input type="submit" class="form-button" value="Actualizar">
      </div>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>