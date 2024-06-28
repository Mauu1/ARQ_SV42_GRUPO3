<?php
$user = "GrupoArqui";  // Cambia a tu usuario de MySQL
$pass = "123";      // Cambia a tu contraseña de MySQL
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass, "Reservas_Teleticket");

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

$fecha = date('Y-m-d H:i:s');
$descripcion = $_POST["descripcion"];
$medio_pago = $_POST["medio_pago"];

$insertar = "INSERT INTO boletos (fecha, descripcion, medio_pago) VALUES ('$fecha', '$descripcion', '$medio_pago')";
$resultado = mysqli_query($connection, $insertar);

if (!$resultado) {
    die("Error al registrar boleto: " . mysqli_error($connection));
} else {
    echo "Boleto registrado exitosamente.";
}

mysqli_close($connection);
?>