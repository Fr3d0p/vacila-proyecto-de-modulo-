<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="content-area py-5">  
        <div class="text-center mb-4">
            <h2 class="fw-bold text-success">Iniciar Sesión</h2>
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
                    <form action="procesar_login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="usuario@ejemplo.com" name="usuario" id="usuario" required>
                            <label for="usuario">Usuario</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
                            <label for="password">Contraseña</label>
                        </div>
                        <button type="submit" name="enviar" id="enviar" class="btn btn-success w-100">Ingresar</button>
                    </form>
                    <hr>
                    <p class="text-center mb-0">¿No tienes cuenta? <a href="registrarse.php" class="text-success text-decoration-none fw-bold">Regístrate aquí</a></p>
                </div>
            </div>  
        </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>