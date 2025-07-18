<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";

$codigo = $_POST["txtcodigo"];

include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";

$producto = new ProductoController();
$datos = $producto->busca_producto($codigo);

?>
<h5>Producto Buscado</h5>
<div class="card">
    <div class="card-body">
       <form name="fbuscar" method="post" action="">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Codigo:</label>
            <input type="text" class="form-control" value="<?php echo $datos['idProducto']; ?>" readonly >
        </div> 
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
            <input type="text" class="form-control" value="<?php echo $datos['nomproducto']; ?>" readonly >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Unidad Medida:</label>
            <input type="text" class="form-control" value="<?php echo $datos['unimed']; ?>" readonly >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stock:</label>
            <input type="text" class="form-control" value="<?php echo $datos['stock']; ?>" readonly  >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio Unitario:</label>
            <input type="text" class="form-control" value="<?php echo $datos['preuni']; ?>" readonly  >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Costo Unitario:</label>
            <input type="text" class="form-control" value="<?php echo $datos['cosuni']; ?>" readonly  >
        </div>
        
       </form> 
    </div>
</div>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
