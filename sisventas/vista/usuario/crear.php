<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
?>
<div class="card">
  <div class="card-body">
    <h5>Crear Nuevo Usuario</h5>
    <form action="grabar.php" method="POST">
      <div class="form-group">
        <label for="nomusuario">Nombre de Usuario</label>
        <input type="text" class="form-control" id="nomusuario" name="nomusuario" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
      </div>
      <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <select class="form-control" id="estado" name="estado">
          <option value="A">Activo</option>
          <option value="I">Inactivo</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>