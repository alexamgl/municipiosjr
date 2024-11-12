<?php
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "dashboard_municipio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['newsTitle'];
    $cuerpo = $_POST['newsBody'];
    $id_usuario = 1; // Usar un ID de usuario de prueba (ajústalo según tu lógica)
    $id_dependencia = 1; // Usar un ID de dependencia de prueba (ajústalo según tu lógica)

    // Manejar la imagen
    if (isset($_FILES['newsImage']) && $_FILES['newsImage']['error'] == UPLOAD_ERR_OK) {
        $imagen = $_FILES['newsImage']['tmp_name'];
        $imagenData = file_get_contents($imagen);
    } else {
        $imagenData = null;
    }

    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO noticias (titulo, cuerpo, imagen, id_usuario, id_dependencia) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssbii", $titulo, $cuerpo, $imagenData, $id_usuario, $id_dependencia);

    if ($stmt->execute()) {
        echo "Noticia guardada exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>
