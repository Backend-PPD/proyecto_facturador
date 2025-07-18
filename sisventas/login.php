<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <br><br>
    <center>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Inicio de Sesión</h5>
          <form name="frmlogin" method="POST" action="/../controlador/valida_session.php">
            <div class="mb-3">
              <label for="usuario" class="form-label">Usuario</label>
              <input type="text" name="usuario" class="form-control" id="usuario" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </center>
  </body>
</html>
