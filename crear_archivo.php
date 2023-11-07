<!DOCTYPE html>
<html>

<head>
    <title>Crear un Nuevo Archivo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <form action="crear_archivo.php" method="POST">
        <h2>Crear Archivo</h2><br>
        <div class="input_formulario">
            <label for="filename">Nombre del archivo:</label>
            <input type="text" id="filename" name="filename" required>
        </div>
        <label class="cont" for="content">Contenido:</label>
        <textarea id="content" name="content" rows="4" required></textarea><br>
        <?php
        session_start();

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.html');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filename = $_POST['filename'];
            $contenido = $_POST['content'];
            $permiso = $_POST['permisos'];



            // creamos el archivo abierto para escribir
            $archivoNuevo = fopen($filename, 'w+'); //$permiso);
        


            if ($archivoNuevo) {
                fwrite($archivoNuevo, $contenido);
                fclose($archivoNuevo);

                echo "Archivo '$filename' fue creado con éxito.";
            } else {
                echo "No se pudo crear el archivo. Verifica la ubicación y los permisos.";
            }
        }
        ?>
        <div class="input_formulario"><br>
            <label class="perm1" for="permiso">Permisos:</label>
            <input type="text" id="permiso" name="permisos" placeholder="Ejemplo w; w+; a; a+; r; r+" required><br><br>
        </div>
        <input class="boton" type="submit" value="Crear">
    </form>
    <!-- Mostrar mensaje de éxito o error aquí -->
    <a href="opciones.php">
        <div><button class="boton2" id="salir">opciones</button></div>
    </a>
    </div>
</body>

</html>