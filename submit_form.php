<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "develop"; // Cambiar por tu usuario de MySQL
$password = "develop1"; // Cambiar por tu contraseña de MySQL
$dbname = "dashboard_municipio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO comentarios (nombre, correo, telefono, comentario) VALUES ('$nombre', '$email', '$telefono', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Comentario enviado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>