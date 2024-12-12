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

// Verificar que se haya enviado un ID
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Eliminar la noticia de la base de datos
    $sql = "DELETE FROM noticias WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Noticia eliminada correctamente";
    } else {
        echo "Error al eliminar la noticia: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
