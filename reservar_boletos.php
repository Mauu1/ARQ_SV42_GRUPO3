<?php
$user = "GrupoArqui";
$pass = "123";      
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass, "Reservas_Teleticket");

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

// Verificar que las variables estén configuradas
if (isset($_POST["descripcion"]) && isset($_POST["medio_pago"])) {
    // Obtener los datos del formulario
    $fecha = date('Y-m-d H:i:s');
    $descripcion = mysqli_real_escape_string($connection, $_POST["descripcion"]);
    $medio_pago = mysqli_real_escape_string($connection, $_POST["medio_pago"]);

    // Insertar los datos en la tabla boletos
    $insertar = "INSERT INTO boletos (fecha, descripcion, medio_pago) VALUES ('$fecha', '$descripcion', '$medio_pago')";
    $resultado = mysqli_query($connection, $insertar);

    // Verificar si la inserción fue exitosa
    if (!$resultado) {
        die("Error al registrar boleto: " . mysqli_error($connection));
    } else {
        echo "Boleto registrado exitosamente.";
    }
} else {
    echo "Error: Los datos del formulario no están completos.";
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);
?>
