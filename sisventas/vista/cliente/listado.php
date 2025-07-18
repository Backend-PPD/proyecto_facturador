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
        <a class="btn btn-primary" href="http://localhost/sisventas/vista/cliente/crear.php" role="button">Nuevo Cliente</a>
        <a class="btn btn-primary" href="http://localhost/sisventas/vista/cliente/buscar.php" role="button">Buscar</a>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">IdCliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">RUC</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
               
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($datos as $fila) {
                    ?>
                    <tr>
                    <td><?php echo $fila['idCliente']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['ruc']; ?></td>
                    <td><?php echo $fila['dircliente']; ?></td>
                    <td><?php echo $fila['telcliente']; ?></td>
                    
                    <td><a class="btn btn-primary" href="http://localhost/sisventas/vista/cliente/update.php?id=<?php echo $fila['idCliente']; ?>" role="button">Editar</a></td>
                    <td><a class="btn btn-primary" href="http://localhost/sisventas/vista/cliente/eliminar.php?id=<?php echo $fila['idCliente']; ?>" role="button">Borrar</a></td>
                    
                    </tr>
                <?php
                }
            ?>  
            </tbody>
        </table>

    </div>
</div>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
