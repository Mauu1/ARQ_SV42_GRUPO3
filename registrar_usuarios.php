<?php
$user = "GrupoArqui";  // Cambia a tu usuario de MySQL
$pass = "123";      // Cambia a tu contraseña de MySQL
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass, "Reservas_Teleticket");

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ($password !== $confirm_password) {
    die("Las contraseñas no coinciden.");
}

$insertar = "INSERT INTO usuarios (nombre, apellido, correo, fecha_nacimiento) VALUES ('$username', 'apellido', 'correo', 'fecha_nacimiento')";
$resultado = mysqli_query($connection, $insertar);

if (!$resultado) {
    die("Error al registrar usuario: " . mysqli_error($connection));
} else {
    echo "Usuario registrado exitosamente.";
}

mysqli_close($connection);
?>