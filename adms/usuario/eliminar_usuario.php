<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$dbname = "pmsjrcom_dashboard_municipio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el ID
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuario WHERE id_usuario = ?";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("i", $id); // 'i' para enteros

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo 'success'; // Enviar éxito
        } else {
            echo 'error'; // Enviar error si la consulta falla
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        echo 'error'; // Enviar error si no se puede preparar la consulta
    }
} else {
    echo 'error'; // Si no se recibe el ID
}

// Cerrar la conexión
$conn->close();
?>
