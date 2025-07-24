<?php
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/sisventas">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mantenimiento
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/producto/listado.php">Productos</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/cliente/listado.php">Clientes</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/proveedor/listado.php">Proveedores</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/categoria/listado.php">Categorías</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/sisventas/vista/venta/listado.php">Ventas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="reportesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu" aria-labelledby="reportesDropdown">
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/reporte/ventas_por_fecha.php">Ventas por Fecha</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/reporte/ventas_por_cliente.php">Ventas por Cliente</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/reporte/ventas_por_producto.php">Ventas por Producto</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>