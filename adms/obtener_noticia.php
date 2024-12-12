<?php
session_start(); // Iniciar sesión para acceder a los datos del usuario logueado

header('Content-Type: application/json');

// Conexión a la base de datos
$servername = "localhost";
$username = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$dbname = "pmsjrcom_dashboard_municipio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos']);
    exit();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id']) || !isset($_SESSION['dependencia_id'])) {
    echo json_encode(['success' => false, 'message' => 'No estás autorizado para acceder a esta información']);
    exit();
}

// Obtener el ID de la noticia
$id = $_GET['id'];

// Obtener la noticia relacionada con el ID proporcionado
$sql = "SELECT titulo, cuerpo, imagen FROM noticias WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontró la noticia
if ($row = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'noticia' => $row]);
} else {
    echo json_encode(['success' => false, 'message' => 'No se encontró la noticia con ese ID']);
}

$stmt->close();
$conn->close();
?>
