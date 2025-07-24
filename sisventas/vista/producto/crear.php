<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/proveedorController.php";
?>

<div class="card">
  <div class="card-body">
    <h5>Nuevo Producto</h5>
        <form method="POST" name="fproducto" action="grabar.php">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
            <input type="text" class="form-control" name="txtnomprodu" placeholder="Nombre Producto">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Unidad Medida:</label>
            <input type="text" class="form-control" name="txtunimed" placeholder="Unidad Medida">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stock:</label>
            <input type="text" class="form-control" name="txtstock" placeholder="Stock">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio Unitario:</label>
            <input type="text" class="form-control" name="txtpreuni" placeholder="Precio Unitario">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Costo Unitario:</label>
            <input type="text" class="form-control" name="txtcosuni" placeholder="Costo Unitario">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Categoria:</label>
            <select name="idcategoria" class="form-control">
                <?php
                $catController = new CategoriaController();
                $categorias = $catController->obtener_listado();
                foreach($categorias as $cat){
                    echo '<option value="' . $cat['idcategoria'] . '">' . $cat['nomcategoria'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Proveedor:</label>
            <select name="idproveedor" class="form-control">
                <?php
                $provController = new ProveedorController();
                $proveedores = $provController->obtener_listado();
                foreach($proveedores as $prov){
                    echo '<option value="' . $prov['idproveedor'] . '">' . $prov['nomproveedor'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" class="form-button" value="Grabar">
            <input type="reset" class="form-button" value="Limpiar">
        </div>
    
    </div>
</div> 
</form>

<?php  include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
