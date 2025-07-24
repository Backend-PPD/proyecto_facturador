<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/usuarioController.php";
$id = $_GET['id'];
$usuarioCtrl = new UsuarioController();
$usuario = $usuarioCtrl->buscar_usuario($id);
?>
<div class="card">
  <div class="card-body">
    <h5>Editar Usuario</h5>
    <form action="actualizar.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $usuario['idusuario']; ?>">
      <div class="form-group">
        <label for="nomusuario">Nombre de Usuario</label>
        <input type="text" class="form-control" id="nomusuario" name="nomusuario" value="<?php echo $usuario['nomusuario']; ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>
      </div>
      <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuario['nombres']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <select class="form-control" id="estado" name="estado">
          <option value="A" <?php if($usuario['estado'] == 'A') echo 'selected'; ?>>Activo</option>
          <option value="I" <?php if($usuario['estado'] == 'I') echo 'selected'; ?>>Inactivo</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>