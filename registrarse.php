
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content-area py-5">
        <div class="text-center mb-3">
            <h1 class="fw-bold text-success">¡Regístrate!</h1>
            <p class="text-muted">Ingresa los datos que se te piden</p>
        </div>
        
        <?php
            $mensaje = isset($_GET["error"]) ? "<div class='alert alert-danger text-center' role='alert'>Usuario no encontrado</div>" :"";
            echo $mensaje;
            $confirmacion = isset($_GET["confirmacion"]) ? "<div class='alert alert-success text-center' role='alert'>Usuario registrado exitosamente</div>" : "";
            echo $confirmacion;
        ?>
        
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <div class="card shadow-sm p-4 mb-5 rounded">
                    <form action="procesar_registro.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="usuario" name="user" id="user" required/>
                            <label for="user">Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Nombre Completo" name="nombre_completo" id="nombre_completo" required/>
                            <label for="nombre_completo">Nombre Completo</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required />
                            <label for="password">Contraseña</label>
                        </div>

                        <button type="submit" name="enviar" id="enviar" class="btn btn-success w-100">Registrarse</button>
                    </form>
                    <hr>
                    <p class="text-center mb-0">¿Ya tienes cuenta? <a href="login.php" class="text-success text-decoration-none fw-bold">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>