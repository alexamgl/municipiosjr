<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$dbname = "pmsjrcom_dashboard_municipio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Error de conexión a la base de datos']));
}

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$titulo = $data['titulo'];
$cuerpo = $data['cuerpo'];

$sql = "UPDATE noticias SET titulo = ?, cuerpo = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $titulo, $cuerpo, $id);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Noticia actualizada correctamente.']);
} else {
    echo json_encode(['error' => 'Error al actualizar la noticia.']);
}

$conn->close();
?>