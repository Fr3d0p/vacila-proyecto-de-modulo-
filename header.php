<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['usuario'])) {
   header('location: login.php?error=1');
   exit();
}else{
  include_once 'conexion.php';
  $rol = $_SESSION['rol'];
  if ($rol == 'administrador') {
  // Si el rol es administrador, mostrar el menú completo
    echo"
    <!doctype html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Vacila</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT' crossorigin='anonymous'>
    <link href='style.css' rel='stylesheet'>
  </head>
  <body>
     <nav class='navbar navbar-expand-lg navbar-dark bg-success shadow-sm'>
    <div class='container-fluid'>
       <a class='navbar-brand' href='index.php'><img src='logo_vacila.png' alt='Logo' width='30' height='30' class='d-inline-block align-text-top'></a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item'>
          <form method='POST' action='procesar_filtro.php' class='d-flex gap-2'>
            <select name='departamento' class='form-select form-select-sm' style='width: auto;' aria-label='Selecciona un departamento'>
              <option value='Todos' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Todos' ? 'selected' : '') . ">Todos (Dpto)</option>
              <option value='Ahuachapán' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Ahuachapán' ? 'selected' : '') . ">Ahuachapán</option>
              <option value='Santa Ana' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Santa Ana' ? 'selected' : '') . ">Santa Ana</option>
              <option value='Sonsonate' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Sonsonate' ? 'selected' : '') . ">Sonsonate</option>
              <option value='Chalatenango' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Chalatenango' ? 'selected' : '') . ">Chalatenango</option>
              <option value='La Libertad' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'La Libertad' ? 'selected' : '') . ">La Libertad</option>
              <option value='Cuscatlán' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Cuscatlán' ? 'selected' : '') . ">Cuscatlán</option>
              <option value='La Paz' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'La Paz' ? 'selected' : '') . ">La Paz</option>
              <option value='Cabañas' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Cabañas' ? 'selected' : '') . ">Cabañas</option>
              <option value='San Salvador' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'San Salvador' ? 'selected' : '') . ">San Salvador</option>
              <option value='San Vicente' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'San Vicente' ? 'selected' : '') . ">San Vicente</option>
              <option value='Usulután' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Usulután' ? 'selected' : '') . ">Usulután</option>
              <option value='San Miguel' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'San Miguel' ? 'selected' : '') . ">San Miguel</option>
              <option value='Morazán' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Morazán' ? 'selected' : '') . ">Morazán</option>
              <option value='La Unión' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'La Unión' ? 'selected' : '') . ">La Unión</option>
            </select>
            <select name='categoria' class='form-select form-select-sm' style='width: auto;' aria-label='Selecciona una categoría'>
              <option value='todos' " . (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'todos' ? 'selected' : '') . ">Todos (Cat)</option>
";
              $consulta_categorias = mysqli_query($conexion, "SELECT DISTINCT categoria FROM destinos");
              while ($fila_categoria = mysqli_fetch_array($consulta_categorias)) {
                $selected = isset($_SESSION['categoria']) && $_SESSION['categoria'] == $fila_categoria['categoria'] ? 'selected' : '';
                echo "<option value='" . $fila_categoria['categoria'] . "' " . $selected . ">" . $fila_categoria['categoria'] . "</option>";
              }
              echo "
            </select>
            <button class='btn btn-outline-light btn-sm' type='submit'>Buscar</button>
          </form>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Extras
          </a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='agregar_lugares.php'>Agregar lugares</a></li>
            <li><a class='dropdown-item' href='reportes.php'>Reportes</a></li>
          </ul>
        </li>
        </li>
         <li class='nav-item'>
          <a class='nav-link' href='salir.php'>salir</a>
      </ul>
      <form class='d-flex' role='search' action='procesar_filtro.php' method='POST'>
        <input class='form-control me-2' method='post' type='search' placeholder='Buscar destino' id='buscar' name='buscar' value='" . (isset($_POST['buscar']) ? $_POST['buscar'] : '') . "' aria-label='Search'/>
        <button class='btn btn-outline-light' type='submit'>Buscar</button>
      </form>
    </div>
  </div>
</nav>   
    ";
  }else{
    // Si el rol no es administrador, mostrar un menú limitado
    echo"
    <!doctype html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Vacila</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT' crossorigin='anonymous'>
    <link href='style.css' rel='stylesheet'>
  </head>
  <body>
     <nav class='navbar navbar-expand-lg navbar-dark bg-success shadow-sm'>
    <div class='container-fluid'>
       <a class='navbar-brand' href='index.php'><img src='logo_vacila.png' alt='Logo' width='30' height='30' class='d-inline-block align-text-top'></a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
         <li class='nav-item'>
          <form method='POST' action='procesar_filtro.php' class='d-flex gap-2'>
            <select name='departamento' class='form-select form-select-sm' style='width: auto;' aria-label='Selecciona un departamento'>
              <option value='Todos' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Todos' ? 'selected' : '') . ">Todos (Dpto)</option>
              <option value='Ahuachapán' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Ahuachapán' ? 'selected' : '') . ">Ahuachapán</option>
              <option value='Santa Ana' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Santa Ana' ? 'selected' : '') . ">Santa Ana</option>
              <option value='Sonsonate' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Sonsonate' ? 'selected' : '') . ">Sonsonate</option>
              <option value='Chalatenango' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Chalatenango' ? 'selected' : '') . ">Chalatenango</option>
              <option value='La Libertad' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'La Libertad' ? 'selected' : '') . ">La Libertad</option>
              <option value='Cuscatlán' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Cuscatlán' ? 'selected' : '') . ">Cuscatlán</option>
              <option value='La Paz' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'La Paz' ? 'selected' : '') . ">La Paz</option>
              <option value='Cabañas' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Cabañas' ? 'selected' : '') . ">Cabañas</option>
              <option value='San Salvador' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'San Salvador' ? 'selected' : '') . ">San Salvador</option>
              <option value='San Vicente' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'San Vicente' ? 'selected' : '') . ">San Vicente</option>
              <option value='Usulután' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Usulután' ? 'selected' : '') . ">Usulután</option>
              <option value='San Miguel' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'San Miguel' ? 'selected' : '') . ">San Miguel</option>
              <option value='Morazán' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'Morazán' ? 'selected' : '') . ">Morazán</option>
              <option value='La Unión' " . (isset($_SESSION['departamento']) && $_SESSION['departamento'] == 'La Unión' ? 'selected' : '') . ">La Unión</option>
            </select>
            <select name='categoria' class='form-select form-select-sm' style='width: auto;' aria-label='Selecciona una categoría'>
              <option value='todos' " . (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'todos' ? 'selected' : '') . ">Todos (Cat)</option>
";
              $consulta_categorias = mysqli_query($conexion, "SELECT DISTINCT categoria FROM destinos");
              while ($fila_categoria = mysqli_fetch_array($consulta_categorias)) {
                $selected = isset($_SESSION['categoria']) && $_SESSION['categoria'] == $fila_categoria['categoria'] ? 'selected' : '';
                echo "<option value='" . $fila_categoria['categoria'] . "' " . $selected . ">" . $fila_categoria['categoria'] . "</option>";
              }
              echo "
            </select>
            <button class='btn btn-outline-light btn-sm' type='submit'>Buscar</button>
          </form>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='salir.php'>salir</a>
      </ul>
      <form class='d-flex' role='search' action='procesar_filtro.php' method='POST'>
        <input class='form-control me-2' type='search' placeholder='Buscar destino' name='buscar' id='buscar' value='" . (isset($_POST['buscar']) ? $_POST['buscar'] : '') . "' method='post' aria-label='Search'/>
        <button class='btn btn-outline-light' type='submit'>Buscar</button>
      </form>
    </div>
  </div>
</nav>   
    ";
  }
}
?>
