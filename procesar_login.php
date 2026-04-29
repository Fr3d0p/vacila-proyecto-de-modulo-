<?php
session_start();
include_once "conexion.php";


if (mysqli_connect_error()) {
    // si se encuentra error en la conexión
    exit('Fallo en la conexión de MySQL: ' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()
if (!isset($_POST['usuario'], $_POST['password'])) {
    // si no hay datos muestra error y redirecciona
    header('Location: login.php?error=1');
    exit();
}

// evitar inyección sql
if ($stmt = $conexion->prepare('SELECT id, password, rol FROM usuarios WHERE user = ?')) {
    // parámetros de enlace de la cadena s
    $stmt->bind_param('s', $_POST['usuario']);
    $stmt->execute();
    
    // acá se valida si lo ingresado coincide con la base de datos
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($id, $password, $rol);
        $stmt->fetch();

        // se confirma que la cuenta existe ahora validamos la contraseña
        if ($_POST['password'] === $password) {
            // la conexión será exitosa, se crea la sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['id'] = $id;
            $_SESSION['rol'] = $rol;
            header('Location: index.php');
            exit();
        } else {
            // contraseña incorrecta
            header('Location: login.php?error=1');
            exit();
        }
    } else {
        // usuario no encontrado
        header('Location: login.php?error=1');
        exit();
    }
    $stmt->close();
} else {
    // error en la preparación de la consulta
    header('Location: login.php?error=1');
    exit();
}
?>