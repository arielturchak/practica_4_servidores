<?php
session_start(); //inicioamos sesión

// Definir como variables usuario y contraseña
$usuario = "admin";
$contrasena = "1234";

// Obtengo los datos del formulario y los alamaceno en las variables username y password
$username = $_POST['username'];
$password = $_POST['password'];

// Validacion de las credenciales 
if ($username === $usuario && $password === $contrasena) { //si el usuario y contraseña coiniden se procede a la autenticación
    $_SESSION['usuario'] = $username; //guardo el usuario y la fecha (acceso)
    $_SESSION['acceso'] = date('Y-m-d H:i:s');
    header('Location: opciones.php'); //se redirige a opciones, ya que todo coincide
} else {
    header('Location: index.html'); //en caso de que no sea el usario lo redirigue a la pagina de inicio
}
?>