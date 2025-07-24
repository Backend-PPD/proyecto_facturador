<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
?>
<div class="card">
  <div class="card-body">
    <h5>Nuevo Proveedor</h5>
    <form method="POST" name="fproveedor" action="grabar.php">
      <div class="mb-3">
        <label class="form-label">ID:</label>
        <input type="text" class="form-control" name="txtidproveedor" placeholder="ID Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="txtnomproveedor" placeholder="Nombre Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">RUC:</label>
        <input type="text" class="form-control" name="txtrucproveedor" placeholder="RUC Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Dirección:</label>
        <input type="text" class="form-control" name="txtdirproveedor" placeholder="Dirección Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Teléfono:</label>
        <input type="text" class="form-control" name="txttelproveedor" placeholder="Teléfono Proveedor">
      </div>
      <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" class="form-control" name="txtemailproveedor" placeholder="Email Proveedor">
      </div>
      <div>
        <input type="submit" class="form-button" value="Grabar">
      </div>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>