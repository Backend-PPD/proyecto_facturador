<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit;
}
require_once 'controlador/conexion.php';

// Función para cargar datos de tablas
function fetchAll($conn, $table) {
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    $data = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

$clientes = fetchAll($conn, 'clientes');
$productos = fetchAll($conn, 'productos');
$ventas = $conn->query("SELECT ventas.*, clientes.nombre as cliente_nombre, productos.nombre as producto_nombre
                       FROM ventas
                       JOIN clientes ON ventas.cliente_id = clientes.id
                       JOIN productos ON ventas.producto_id = productos.id
                       ORDER BY ventas.fecha DESC");
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard - Sistema de Ventas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
    <a href="controlador/logout.php" class="btn btn-danger mb-3">Cerrar sesión</a>

    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="clientes-tab" data-bs-toggle="tab" data-bs-target="#clientes" type="button" role="tab">Clientes</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab">Productos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ventas-tab" data-bs-toggle="tab" data-bs-target="#ventas" type="button" role="tab">Ventas</button>
      </li>
    </ul>

    <div class="tab-content mt-3" id="dashboardTabsContent">
      <!-- Clientes -->
      <div class="tab-pane fade show active" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
        <h3>Clientes</h3>
        <table class="table table-bordered">
          <thead>
            <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th></tr>
          </thead>
          <tbody>
            <?php foreach($clientes as $cliente): ?>
              <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
                <td><?= htmlspecialchars($cliente['telefono']) ?></td>
              </tr>
            <?php endforeach; ?>
            <?php if(empty($clientes)) echo "<tr><td colspan='4'>No hay clientes registrados.</td></tr>"; ?>
          </tbody>
        </table>
      </div>

      <!-- Productos -->
      <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="productos-tab">
        <h3>Productos</h3>
        <table class="table table-bordered">
          <thead>
            <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>
          </thead>
          <tbody>
            <?php foreach($productos as $producto): ?>
              <tr>
                <td><?= $producto['id'] ?></td>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                <td><?= htmlspecialchars($producto['descripcion']) ?></td>
                <td>$<?= number_format($producto['precio'], 2) ?></td>
                <td><?= $producto['stock'] ?></td>
              </tr>
            <?php endforeach; ?>
            <?php if(empty($productos)) echo "<tr><td colspan='5'>No hay productos registrados.</td></tr>"; ?>
          </tbody>
        </table>
      </div>

      <!-- Ventas -->
      <div class="tab-pane fade" id="ventas" role="tabpanel" aria-labelledby="ventas-tab">
        <h3>Ventas</h3>
        <table class="table table-bordered">
          <thead>
            <tr><th>ID</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Fecha</th></tr>
          </thead>
          <tbody>
            <?php 
            if($ventas && $ventas->num_rows > 0):
              while($venta = $ventas->fetch_assoc()):
            ?>
              <tr>
                <td><?= $venta['id'] ?></td>
                <td><?= htmlspecialchars($venta['cliente_nombre']) ?></td>
                <td><?= htmlspecialchars($venta['producto_nombre']) ?></td>
                <td><?= $venta['cantidad'] ?></td>
                <td><?= $venta['fecha'] ?></td>
              </tr>
            <?php 
              endwhile;
            else:
              echo "<tr><td colspan='5'>No hay ventas registradas.</td></tr>";
            endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
