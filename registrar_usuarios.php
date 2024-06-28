<?php
$user = "GrupoArqui";  // Cambia a tu usuario de MySQL
$pass = "123";      // Cambia a tu contraseña de MySQL
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass, "Reservas_Teleticket");

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

// Verificar que los datos del formulario se enviaron correctamente
if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
    // Obtener los datos del formulario
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($connection, $_POST["apellido"]);
    $correo = mysqli_real_escape_string($connection, $_POST["correo"]);
    $fecha_nacimiento = mysqli_real_escape_string($connection, $_POST["fecha_nacimiento"]);
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($connection, $_POST["confirm_password"]);

    // Verificar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar los datos en la tabla usuarios
    $insertar = "INSERT INTO usuarios (nombre, apellido, correo, fecha_nacimiento, username, password) VALUES ('$nombre', '$apellido', '$correo', '$fecha_nacimiento', '$username', '$hashed_password')";
    $resultado = mysqli_query($connection, $insertar);

    // Verificar si la inserción fue exitosa
    if (!$resultado) {
        die("Error al registrar usuario: " . mysqli_error($connection));
    } else {
        echo "Usuario registrado exitosamente.";
    }
} else {
    echo "Error: Todos los campos del formulario son obligatorios.";
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);
echo '<a href="index1.html"> Volver Atras</a>';

exit();
?>
