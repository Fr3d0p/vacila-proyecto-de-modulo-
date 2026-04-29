<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
    exit();
}

if (isset($_POST['departamento'])) {
    $_SESSION['departamento'] = $_POST['departamento'];
    $_SESSION['buscar'] = ""; // Limpiar el término de búsqueda al usar filtros
}
if (isset($_POST['categoria'])) {
    $_SESSION['categoria'] = $_POST['categoria'];
    $_SESSION['buscar'] = ""; // Limpiar el término de búsqueda al usar filtros
}
if (isset($_POST['buscar'])) {
    $_SESSION['buscar'] = $_POST['buscar'];
}

header('location: index.php');
exit();
?>