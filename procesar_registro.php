<?php
session_start();
include_once "conexion.php";

///registrar usuario

if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['nombre_completo']) ) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $nombre_completo = $_POST['nombre_completo'];

    // Verificar si el usuario ya existe
    $result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE user='$user'");
    if ($result && mysqli_num_rows($result) > 0) {
        // El usuario ya existe
        header("location: registrarse.php?error=true");
        exit();
    } else {
        // Insertar el nuevo usuario en la base de datos
        $insertQuery = "INSERT INTO usuarios (user, password, nombre_completo) VALUES ('$user', '$password', '$nombre_completo')";
        if (mysqli_query($conexion, $insertQuery)) {
            // Registro exitoso
            header("location: login.php?confirmacion=true");
            exit();
        } else {
            // Error al insertar el usuario
            header("location: registrarse.php?error=true");
            exit();
        }
    }
} else {
    // Si no se han enviado todos los campos necesarios
    header("location: registrarse.php?error=true");
    exit();
}
?>