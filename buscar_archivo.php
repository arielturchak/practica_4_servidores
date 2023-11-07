<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit();
}

$files = array(); // Array para almacenar los archivos encontrados
$searchedFiles = array(); // Array para almacenar los archivos que coinciden con la búsqueda

// Ruta del directorio interno (ajusta esto a tu estructura de archivos)
$directory = 'C:\xampp\htdocs';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['filename'];

    // Escanea el directorio y obtén una lista de archivos
    $files = scandir($directory);

    // Itera a través de la lista de archivos
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && strpos($file, $filename) !== false) { //$filename es lo que buscamos dentro de $fle
            // Compara el nombre del archivo con la búsqueda
            $searchedFiles[] = $file; // Agrega el archivo al array de resultados
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Buscar Archivo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <form action="buscar_archivo.php" method="POST">
        <h2>Buscar un Archivo</h2><br>
        <div class="input_formulario">
            <label for="filename">Nombre del archivo:</label>
            <input type="text" id="archivos" name="filename" required>
        </div>
        <div class="php">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { //si el metodo es post se pasa al condicional
                echo "<h3>Archivos encontrados:</h3>";
                if (empty($searchedFiles)) {
                    echo "No se encontraron archivos con ese nombre.";
                } else {
                    echo "<ul>";
                    foreach ($searchedFiles as $foundFile) { //recorro el array searchedFiles
                        echo "<li><a href='$directory/$foundFile'>$foundFile</a></li>"; // se pone la variable de la ruta ruta y la variable del nombre del archivo
                    }
                    echo "</ul>";
                }
            }
            ?>
        </div>
        <div class="input_formulario"><br>
            <input class="buscar" type="submit" value="Buscar">
        </div>
    </form>


    <div class="opciones-button">
        <a href="opciones.php">
            <div><button class="boton1" id="salir">opciones</button></div>
        </a>
    </div>
</body>

</html>