<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambiar por tu usuario de MySQL
$password = ""; // Cambiar por tu contraseña de MySQL
$dbname = "regulaciones_db";

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
    $sql = "INSERT INTO comentarios (nombre, email, telefono, descripcion) VALUES ('$nombre', '$email', '$telefono', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Comentario enviado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();



/* 
CREATE DATABASE regulaciones_db;

USE regulaciones_db;

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



*/
?>