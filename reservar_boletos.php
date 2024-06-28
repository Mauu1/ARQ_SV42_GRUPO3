<?php
$user = "GrupoArqui";  // Cambia a tu usuario de MySQL
$pass = "123";      // Cambia a tu contraseña de MySQL
$host = "localhost";

// Conectar a la base de datos
$connection = mysqli_connect($host, $user, $pass, "Reservas_Teleticket");

// Verificar la conexión
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$fecha = date('Y-m-d H:i:s');
$descripcion = mysqli_real_escape_string($connection, $_POST["descripcion"]);
$medio_pago = mysqli_real_escape_string($connection, $_POST["medio_pago"]);

// Consulta para insertar datos en la tabla boletos
$insertar = "INSERT INTO boletos (fecha, descripcion, medio_pago) VALUES ('$fecha', '$descripcion', '$medio_pago')";
$resultado = mysqli_query($connection, $insertar);

// Verificar si la inserción fue exitosa
if (!$resultado) {
    die("Error al registrar boleto: " . mysqli_error($connection));
} else {
    echo "Boleto registrado exitosamente.";
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);

// Enlace para volver a la página anterior
echo '<a href="index1.html"> Volver Atras</a>';
?>
