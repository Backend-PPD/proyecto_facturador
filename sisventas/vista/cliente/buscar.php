<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";


?>
<h5>Buscando Cliente...</h5>
<div class="card">
    <div class="card-body">
       <form name="fbuscar" method="post" action="show.php">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"Codigo:</label>
            <input type="text" class="form-control" name="txtcodigo" placeholder="Codigo Cliente: ">
        </div>
        <div>
            <input type="submit" class="form-button" value="Buscar">
            <input type="reset" class="form-button" value="Limpiar">
        </div>
       </form> 
    </div>
</div>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
