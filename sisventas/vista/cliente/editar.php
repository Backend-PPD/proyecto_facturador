<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
include $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/clienteController.php";

$id = $_GET['id'];
$clienteCtrl = new ClienteController();
$cliente = $clienteCtrl->buscar_cliente($id);
?>
<div class="card">
  <div class="card-body">
    <h5>Editar Cliente</h5>
        <form method="POST" name="fcliente" action="actualizar.php">
        <input type="hidden" name="txtidcliente" value="<?php echo isset($cliente['idcliente']) ? $cliente['idcliente'] : ''; ?>">
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="txtnomcliente" value="<?php echo isset($cliente['nomcliente']) ? $cliente['nomcliente'] : ''; ?>" placeholder="Nombre Cliente">
        </div>
        <div class="mb-3">
            <label class="form-label">RUC:</label>
            <input type="text" class="form-control" name="txtruccliente" value="<?php echo isset($cliente['ruccliente']) ? $cliente['ruccliente'] : ''; ?>" placeholder="RUC Cliente">
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="txtdircliente" value="<?php echo isset($cliente['dircliente']) ? $cliente['dircliente'] : ''; ?>" placeholder="Dirección Cliente">
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="txttelcliente" value="<?php echo isset($cliente['telcliente']) ? $cliente['telcliente'] : ''; ?>" placeholder="Teléfono Cliente">
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="txtemailcliente" value="<?php echo isset($cliente['emailcliente']) ? $cliente['emailcliente'] : ''; ?>" placeholder="Email Cliente">
        </div>
        <div>
            <input type="submit" class="form-button" value="Actualizar">
        </div>
    </div>
</div> 
</form>
<?php  include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>