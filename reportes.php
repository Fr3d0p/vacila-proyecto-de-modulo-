<?php
include_once 'conexion.php';
include_once 'header.php';
if ($_SESSION['rol'] !== 'administrador') {
    header('location: index.php');
    exit();
}
?>
<div class="container mt-4 ">
    <div class="row justify-content-between py-5 align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h2>Reportes</h2>
            <p>Aquí puedes generar reportes de destinos y usuarios.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
            <!-- Formulario para seleccionar el tipo de reporte -->
<form action="reportes.php" accept="_blank" method="POST">
            <select name="reportes" class="form-select mb-3">
                <option value="">Selecciona un reporte</option>
                <option value="destinos">Reporte de Destinos</option>
                <option value="usuarios">Reporte de Usuarios</option>
            </select>
            <input type="submit" class="btn btn-secondary" value="Generar Reporte">
            </form>
        </div>
        <?php
        if (isset($_POST['reportes']) && $_POST['reportes'] === 'destinos') {
            // Generar reporte de destinos
            echo "<div class='alert alert-success mt-4'>Reporte de destinos generado exitosamente.</div>";
             echo"<table class='table table-striped mt-4'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Categoría</th>
                    <th>Clima Promedio</th>
                    <th>Precio Sugerido (USD)</th>
                </tr>
            </thead>
            <tbody>";
            
                $consulta = mysqli_query($conexion, 'SELECT * FROM destinos');
                while ($fila = mysqli_fetch_array($consulta)) {
                    echo "
                    <tr>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['nombre'] . "</td>
                        <td>" . $fila['departamento'] . "</td>
                        <td>" . $fila['categoria'] . "</td>
                        <td>" . $fila['clima_promedio'] . "</td>
                        <td>$" . $fila['precio_sugerido_usd'] . " USD</td>
                    </tr>
                    ";
                }echo"</tbody>     </table>";
                echo "<div class='alert alert-info mt-4'>Total de destinos: " . mysqli_num_rows($consulta) . "</div>";
               
        } elseif (isset($_POST['reportes']) && $_POST['reportes'] === 'usuarios') {
            // Generar reporte de usuarios
            echo "<div class='alert alert-success mt-4'>Reporte de usuarios generado exitosamente.</div>";
             echo"<table class='table table-striped mt-4'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre completo</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>";
            
                $consulta = mysqli_query($conexion, 'SELECT * FROM usuarios');
                while ($fila = mysqli_fetch_array($consulta)) {
                    echo "
                    <tr>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['nombre_completo'] . "</td>
                        <td>" . $fila['user'] . "</td>
                        <td>" . $fila['password'] . "</td>
                        <td>" . $fila['rol'] . "</td>
                    </tr>
                    ";
                } echo"</tbody>     </table>";
                echo "<div class='alert alert-info mt-4'>Total de usuarios: " . mysqli_num_rows($consulta) . "</div>";
               
        }
                ?>
         
    </div>
    <?php
    include_once 'footer.php';
    ?>