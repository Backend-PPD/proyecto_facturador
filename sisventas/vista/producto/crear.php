<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
?>

<div class="card">
  <div class="card-body">
    <h5>Nuevo Producto</h5>
        <form method="POST" name="fproducto" action="grabar.php">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
            <input type="text" class="form-control" name="txtnomprodu" placeholder="Nombre Producto" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Unidad Medida:</label>
            <input type="text" class="form-control" name="txtunimed" placeholder="Unidad Medida" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stock:</label>
            <input type="text" class="form-control" name="txtstock" placeholder="Stock" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio Unitario:</label>
            <input type="text" class="form-control" name="txtpreuni" placeholder="Precio Unitario" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Costo Unitario:</label>
            <input type="text" class="form-control" name="txtcosuni" placeholder="Costo Unitario" required>
        </div>
        <div>
            <input type="submit" class="form-button" value="Grabar">
            <input type="reset" class="form-button" value="Limpiar">
        </div>
    
    </div>
</div> 
</form>

<?php  include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
