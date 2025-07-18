<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";

$codigo = $_GET["id"];

include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";

$producto = new ProductoController();
$datos = $producto->busca_producto($codigo);

?>
<h5>Actualizando Producto</h5>
<div class="card">
    <div class="card-body">
       <form name="fupdate" method="post" action="store.php">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Codigo:</label>
            <input type="text" class="form-control" name="txtid" value="<?php echo $datos['idProducto']; ?>" readonly >
        </div> 
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
            <input type="text" class="form-control" name="txtnom" value="<?php echo $datos['nomproducto']; ?>"  >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Unidad Medida:</label>
            <input type="text" class="form-control" name="txtund" value="<?php echo $datos['unimed']; ?>"  >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stock:</label>
            <input type="text" class="form-control" name="txtstk" value="<?php echo $datos['stock']; ?>"  >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio Unitario:</label>
            <input type="text" class="form-control" name="txtpre" value="<?php echo $datos['preuni']; ?>"   >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Costo Unitario:</label>
            <input type="text" class="form-control" name="txtcos" value="<?php echo $datos['cosuni']; ?>"  >
        </div>
         <div>
            <input type="submit" class="form-button" value="Actualizar">
            <input type="reset" class="form-button" value="Limpiar">
            <input type="hidden" class="form-control" name="codigo" value="<?php echo $datos['idProducto']; ?>" >
        </div>
       </form> 
    </div>
</div>


<?php  include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
