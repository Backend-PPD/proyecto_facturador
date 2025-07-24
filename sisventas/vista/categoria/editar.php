<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/categoriaController.php";

$id = $_GET['id'];
$categoriaCtrl = new CategoriaController();
$categoria = $categoriaCtrl->buscar_categoria($id);
?>
<div class="card">
  <div class="card-body">
    <h5>Editar Categoría</h5>
    <form method="POST" name="fcategoria" action="actualizar.php">
      <input type="hidden" name="txtidcategoria" value="<?php echo $categoria['idcategoria']; ?>">
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="txtnomcategoria" value="<?php echo $categoria['nomcategoria']; ?>" placeholder="Nombre Categoría">
      </div>
      <div>
        <input type="submit" class="form-button" value="Actualizar">
      </div>
    </form>
  </div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>