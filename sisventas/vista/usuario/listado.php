<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/usuarioController.php";
$usuarioCtrl = new UsuarioController();
$usuarios = $usuarioCtrl->obtener_listado();
?>
<div class="card">
  <div class="card-body">
    <h5>Listado de Usuarios</h5>
    <a href="crear.php" class="btn btn-primary">Nuevo Usuario</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre de Usuario</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Email</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario) { ?>
        <tr>
          <td><?php echo $usuario['idusuario']; ?></td>
          <td><?php echo $usuario['nomusuario']; ?></td>
          <td><?php echo $usuario['apellidos']; ?></td>
          <td><?php echo $usuario['nombres']; ?></td>
          <td><?php echo $usuario['email']; ?></td>
          <td><?php echo $usuario['estado']; ?></td>
          <td>
            <a href="editar.php?id=<?php echo $usuario['idusuario']; ?>" class="btn btn-warning">Editar</a>
            <a href="eliminar.php?id=<?php echo $usuario['idusuario']; ?>" class="btn btn-danger">Eliminar</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>