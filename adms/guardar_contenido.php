<?php
$servername = "localhost";
$username = "develop";
$password = "develop1";
$dbname = "dashboard_municipio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el contenido HTML desde la solicitud POST
$data = json_decode(file_get_contents("php://input"), true);
$titulo = $data['titulo'];
$cuerpo = $data['cuerpo'];
$imagen = $data['imagen'];
$id_usuario = $data['id_usuario'];
$id_dependencia = $data['id_dependencia'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO noticias (titulo,cuerpo,imagen,id_usuario,id_dependencia) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $titulo,$cuerpo,$imagen,$id_usuario,$id_dependencia);

if ($stmt->execute()) {
    echo json_encode(["message" => "Contenido guardado exitosamente."]);
} else {
    echo json_encode(["message" => "Error al guardar el contenido."]);
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
