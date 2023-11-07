<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../Formulario/css/estilos.css">
    <title>Opciones del Directorio</title>
</head>

<body>
    <div class="contenedor">
        <h2>Bienvenido,
            <?php echo $_SESSION['usuario']; ?>.
        </h2>
        <p>Fecha y hora de acceso:
            <?php echo $_SESSION['acceso']; ?>
        </p><br>
        <div class="input_formulario">
            <img class="input_icon" src="imagenes/mapa.png" alt="ruta actual">
            <div class="opcion"><a href="ruta_actual.php">Obtener la ruta actual</a></div>
        </div>

        <div class="input_formulario">
            <img class="input_icon" src="imagenes/buscar.png" alt="buscar">
            <div class="opcion"><a href="buscar_archivo.php">Buscar un fichero</a></div>
        </div>

        <div class="input_formulario">
            <img class="input_icon" src="imagenes/agregar.png" alt="crear fichero">
            <div class="opcion"><a href="crear_archivo.php">Crear un fichero</a></div>
        </div>
        <div>
            <a href="index.html">
                <button class="boton3" id="salir">inicio</button>
            </a>
        </div>

</body>

</html>