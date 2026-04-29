<?php
session_start();
include_once 'conexion.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: index.php');
    exit();
}else{
    // Verificar si el usuario tiene el rol de administrador
    if ($_SESSION['rol'] !== 'administrador') {
        header('location: index.php');
        exit();
    }
    // Verificar si se han enviado los datos del formulario
    if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['departamento']) && isset($_POST['categoria']) && isset($_POST['clima']) && isset($_POST['precio']) && isset($_POST['imagen']) && isset($_POST['ubicacion'])) {
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $departamento = mysqli_real_escape_string($conexion, $_POST['departamento']);
        $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $clima = mysqli_real_escape_string($conexion, $_POST['clima']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $imagen = mysqli_real_escape_string($conexion, $_POST['imagen']);
    $ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
    // Insertar el nuevo destino en la base de datos
    $insertar = mysqli_query($conexion, "INSERT INTO destinos (id, nombre, descripcion, departamento, categoria, clima_promedio, precio_sugerido_usd, imagen_url, link_ubicacion) VALUES ('', '$nombre', '$descripcion', '$departamento', '$categoria', '$clima', '$precio', '$imagen', '$ubicacion')");
    
    if ($insertar) {
        header('location: index.php');
        exit();
    } else {
        echo "Error al agregar el destino: " . mysqli_error($conexion);
    }
} else {
    echo "Todos los campos son obligatorios.";
}
}
?>