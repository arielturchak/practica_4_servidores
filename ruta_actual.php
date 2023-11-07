<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit();
}

$ruta = getcwd(); // Obtener la ruta actual del servidor
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ruta Actual</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="contenedor">
        <h2>Ruta Actual</h2>
        <p>
            <?php echo $ruta; ?>
        </p><br>

        <a href="opciones.php">
            <div><button class="boton" id="salir">opciones</button></div>
        </a>
    </div>
</body>

</html>