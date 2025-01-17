<?php
header('Content-Type: application/json'); // Indicar que la respuesta es JSON
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = "localhost";
$username = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$dbname = "pmsjrcom_dashboard_municipio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['error' => 'Error de conexión a la base de datos']);
    exit();
}

// Leer el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que los datos sean válidos
if (!isset($data['id'], $data['titulo'], $data['cuerpo'])) {
    echo json_encode(['error' => 'Datos inválidos.']);
    exit();
}

// Extraer datos
$id = $data['id'];
$titulo = $data['titulo'];
$cuerpo = $data['cuerpo'];

// Actualizar la noticia en la base de datos
$sql = "UPDATE noticias SET titulo = ?, cuerpo = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $titulo, $cuerpo, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Noticia actualizada correctamente.']);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al actualizar la noticia.']);
}

$stmt->close();
$conn->close();
?>
