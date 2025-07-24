<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";
$cliente = new ClienteController();
$datos = $cliente->obtener_listado();
?>
<h5>Listado de Clientes</h5>
<div class="card">
    <div class="card-body">
        <a class="btn btn-primary" href="crear.php" role="button">Nuevo Cliente</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">IdCliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">RUC</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($datos as $fila) {
                    ?>
                    <tr>
                    <td><?php echo $fila['idcliente']; ?></td>
                    <td><?php echo $fila['nomcliente']; ?></td>
                    <td><?php echo $fila['ruc']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $fila['idcliente']; ?>">Editar</a> |
                        <a href="eliminar.php?id=<?php echo $fila['idcliente']; ?>" onclick="return confirm('¿Está seguro de eliminar este cliente?');">Borrar</a>
                    </td>
                    </tr>
                <?php
                }
            ?>  
            </tbody>
        </table>
    </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>