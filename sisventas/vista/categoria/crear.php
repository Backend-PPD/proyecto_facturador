<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
?>
<div class="card">
  <div class="card-body">
    <h5>Nueva Categoría</h5>
    <form method="POST" name="fcategoria" action="grabar.php">
      
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="txtnomcategoria" placeholder="Nombre Categoría">
      </div>
      <div>
        <input type="submit" class="form-button" value="Grabar">
      </div>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>