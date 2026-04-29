<?php
include_once 'conexion.php';
include_once 'header.php';
if ($rol != 'administrador') {
    header('location: index.php');
    exit();
}
?>
<main class="content-area">
  <div class="container py-5">
    <div class="text-center mb-5">
      <span class="eyebrow">Administra los destinos</span>
      <h1 class="display-5 fw-bold">Agregar nuevos lugares</h1>
      <p class="lead text-muted">Completa el formulario para añadir un nuevo destino a la plataforma.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <form action="procesar_agregar.php" method="POST" class="card p-4 shadow-sm border-0">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del destino</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <select name="departamento" id="departamento" class="form-select" required>
              <option value="">Selecciona un departamento</option>
              <?php
              $consulta_departamentos = mysqli_query($conexion, "SELECT DISTINCT departamento FROM destinos");
              while ($fila_departamento = mysqli_fetch_array($consulta_departamentos)) {
                echo "<option value='" . $fila_departamento['departamento'] . "'>" . $fila_departamento['departamento'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" required>
            <label for="clima" class="form-label mt-3">Clima promedio</label>
            <input type="text" name="clima" id="clima" class="form-control" required>
            <label for="precio" class="form-label mt-3">Precio sugerido (USD)</label>
            <input type="number" name="precio" id="precio" class="form-control" required>
            <label for="imagen" class="form-label mt-3">URL de la imagen</label>
            <input type="url" name="imagen" id="imagen" class="form-control" required>
            <label for="ubicacion" class="form-label mt-3">Link de ubicación (Google Maps)</label>
            <input type="url" name="ubicacion" id="ubicacion" class="form-control" required>
            <input type="submit" value="Agregar destino" class="btn btn-success mt-4 w-100">
          </div>