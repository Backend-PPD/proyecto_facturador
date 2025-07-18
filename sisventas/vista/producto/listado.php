<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";

include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/productoController.php";

$producto = new ProductoController();
$datos = $producto->obtener_listado();

?>
<h5>Listado de Productos</h5>
<div class="card">
    <div class="card-body">
        <a class="btn btn-primary" href="http://localhost/sisventas/vista/producto/crear.php" role="button">Nuevo Producto</a>
        <a class="btn btn-primary" href="http://localhost/sisventas/vista/producto/buscar.php" role="button">Buscar</a>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">IdProducto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Unidad</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio Unit.</th>
                <th scope="col">Costo Unit.</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($datos as $fila) {
                    ?>
                    <tr>
                    <td><?php echo $fila['idProducto']; ?></td>
                    <td><?php echo $fila['nomproducto']; ?></td>
                    <td><?php echo $fila['unimed']; ?></td>
                    <td><?php echo $fila['stock']; ?></td>
                    <td><?php echo $fila['preuni']; ?></td>
                    <td><?php echo $fila['cosuni']; ?></td>
                    <td><a class="btn btn-primary" href="http://localhost/sisventas/vista/producto/update.php?id=<?php echo $fila['idProducto']; ?>" role="button">Editar</a></td>
                    <td><a class="btn btn-primary" href="http://localhost/sisventas/vista/producto/eliminar.php?id=<?php echo $fila['idProducto']; ?>" role="button">Borrar</a></td>
                    
                    </tr>
                <?php
                }
            ?>  
            </tbody>
        </table>

    </div>
</div>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
