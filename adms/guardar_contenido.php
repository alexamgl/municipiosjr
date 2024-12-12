<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$dbname = "pmsjrcom_dashboard_municipio";

// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit();
}

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos']);
    exit();
}

function limpiarContenido($cuerpo) {
    // Eliminar barras invertidas de todas las rutas de imagen
    return stripslashes($cuerpo);  // Elimina todas las barras invertidas
}


// Obtener los datos enviados por POST
$data = json_decode(file_get_contents("php://input"), true);

// Validar que los datos obligatorios estén presentes
if (!isset($data['titulo']) || !isset($data['cuerpo']) || !isset($data['imagen'])) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    exit();
}


$titulo = $conn->real_escape_string($data['titulo']);
$cuerpo = $conn->real_escape_string($data['cuerpo']);
$cuerpo = str_replace('"', '', $cuerpo);  // Elimina las comillas dobles
$imagen = $conn->real_escape_string($data['imagen']);
$id_usuario = $_SESSION['user_id'];  // Obtener el ID del usuario autenticado
$id_dependencia = $_SESSION['dependencia_id']; // Obtener dependencia de la sesión

// Inserción en la base de datos
$sql = "INSERT INTO noticias (titulo, cuerpo, imagen, id_usuario, id_dependencia) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Error en la consulta SQL: ' . $conn->error]);
    exit();
}

$stmt->bind_param("sssii", $titulo, $cuerpo, $imagen, $id_usuario, $id_dependencia);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Noticia guardada exitosamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar la noticia']);
}

$stmt->close();
$conn->close();
?>
