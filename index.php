<?php
include_once 'conexion.php';
include_once 'header.php';
$rol = $_SESSION['rol'];
?>
<main class="content-area">
  <div class="container py-5">
    <div class="text-center mb-5">
      <span class="eyebrow">Planifica tu próxima escapada</span>
      <h1 class="display-5 fw-bold">Destinos para vacilar</h1>
      <p class="lead text-muted">Explora lugares únicos con clima, precio y ubicación en un solo sitio.</p>
    </div>
    <div class="row g-4">
<?php
// Obtener los filtros seleccionados por el usuario
$departamento = isset($_SESSION['departamento']) ? $_SESSION['departamento'] : "Todos";
$categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "todos";
$buscar = isset($_SESSION['buscar']) ? $_SESSION['buscar'] : "";
// Construir la consulta SQL según los filtros
if ($departamento != 'Todos' && $categoria != 'todos') {
    $consulta = mysqli_query($conexion, "SELECT * FROM destinos WHERE departamento='$departamento' AND categoria='$categoria'");
} else if ($departamento != 'Todos') {
    $consulta = mysqli_query($conexion, "SELECT * FROM destinos WHERE departamento='$departamento'");
} else if ($categoria != 'todos') {
    $consulta = mysqli_query($conexion, "SELECT * FROM destinos WHERE categoria='$categoria'");
} else {
  if (!empty($buscar)) {
    $consulta = mysqli_query($conexion, "SELECT * FROM destinos WHERE nombre LIKE '%$buscar%' OR descripcion LIKE '%$buscar%'or departamento LIKE '%$buscar%' OR categoria LIKE '%$buscar%' or clima_promedio LIKE '%$buscar%' OR precio_sugerido_usd LIKE '%$buscar%'");
  } else {
    $consulta = mysqli_query($conexion, "SELECT * FROM destinos");
  }
}
// Mostrar los destinos obtenidos de la consulta
while ($fila = mysqli_fetch_array($consulta)) {
    echo "
    <div class='col-12 col-md-6 col-lg-4'>
            <div class='card h-100 border-0 shadow-sm'>
              <div class='card-body d-flex flex-column'>
                <div class='mb-3'>
                  <span class='badge bg-success me-1'>" . $fila['categoria'] . "</span>
                </div>
                <img src='" . $fila['imagen_url'] . "' class='card-img-top mb-3' height='100' width='100' style='object-fit: cover;' alt='" . $fila['nombre'] . "'>
                <h5 class='card-title mb-3'>" . $fila['nombre'] . "</h5>
                <p class='card-text text-secondary mb-4'>" . $fila['descripcion'] . "</p>
                <ul class='list-unstyled mb-4 small text-muted'>
                  <li><strong>debug:</strong> " . $departamento . " - " . $categoria . "- " . $buscar . "</li>
                  <li><strong>Departamento:</strong> " . $fila['departamento'] . "</li>
                  <li><strong>Clima:</strong> " . $fila['clima_promedio'] . "</li>
                  <li><strong>Precio:</strong> $" . $fila['precio_sugerido_usd'] . " USD</li>
                </ul>
                <a href='" . $fila['link_ubicacion'] . "' class='mt-auto btn btn-sm btn-outline-success' target='_blank'>Ver ubicación</a>
              </div>
            </div>
          </div>";
}
?>
    </div>
  </div>
</main>
<?php
include_once 'footer.php';
?>