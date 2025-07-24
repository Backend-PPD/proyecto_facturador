<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";
$categoriaCtrl = new CategoriaController();
$categorias = $categoriaCtrl->obtener_listado();
?>
<div class="card">
  <div class="card-body">
    <h5>Listado de Categorías</h5>
    <a href="crear.php" class="btn btn-primary">Nueva Categoría</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categorias as $categoria) { ?>
        <tr>
          <td><?php echo $categoria['idcategoria']; ?></td>
          <td><?php echo $categoria['nomcategoria']; ?></td>
          <td>
            <a href="editar.php?id=<?php echo $categoria['idcategoria']; ?>" class="btn btn-warning">Editar</a>
            <a href="eliminar.php?id=<?php echo $categoria['idcategoria']; ?>" class="btn btn-danger">Eliminar</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>