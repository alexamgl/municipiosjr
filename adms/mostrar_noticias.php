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

// Manejar la eliminación de una noticia
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM noticias WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Noticia eliminada exitosamente.";
    } else {
        echo "Error al eliminar la noticia: " . $stmt->error;
    }
    $stmt->close();
}

// Manejar la actualización de una noticia
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $cuerpo = $_POST['cuerpo'];

    // Si hay una nueva imagen, actualizamos también la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $imagenData = file_get_contents($imagen);
        $sql = "UPDATE noticias SET titulo = ?, cuerpo = ?, imagen = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssbi", $titulo, $cuerpo, $imagenData, $id);
    } else {
        // Si no se sube una nueva imagen, solo actualizamos título y cuerpo
        $sql = "UPDATE noticias SET titulo = ?, cuerpo = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $titulo, $cuerpo, $id);
    }

    if ($stmt->execute()) {
        echo "Noticia actualizada exitosamente.";
    } else {
        echo "Error al actualizar la noticia: " . $stmt->error;
    }
    $stmt->close();
}

// Mostrar todas las noticias
$sql = "SELECT id, titulo, cuerpo, imagen FROM noticias";
$result = $conn->query($sql);

// Verificar si hay noticias disponibles
if ($result->num_rows > 0) {
    echo "<div class='container mt-5'>";
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $titulo = $row['titulo'];
        $cuerpo = substr($row['cuerpo'], 0, 100); // Mostrar solo los primeros 100 caracteres
        $imagen = base64_encode($row['imagen']); // Codificar imagen para mostrar

        echo "
            <div class='card mb-4'>
                <img src='data:image/jpeg;base64,$imagen' class='card-img-top' alt='Imagen de la noticia'>
                <div class='card-body'>
                    <h5 class='card-title'>$titulo</h5>
                    <p class='card-text'>$cuerpo...</p>
                    <form method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='$id'>
                        
                        <!-- Campos para actualizar -->
                        <div class='mb-3'>
                            <label for='titulo-$id'>Título:</label>
                            <input type='text' name='titulo' class='form-control' id='titulo-$id' value='$titulo'>
                        </div>
                        <div class='mb-3'>
                            <label for='cuerpo-$id'>Cuerpo:</label>
                            <textarea name='cuerpo' class='form-control' id='cuerpo-$id' rows='3'>".$row['cuerpo']."</textarea>
                        </div>
                        <div class='mb-3'>
                            <label for='imagen-$id'>Imagen (opcional):</label>
                            <input type='file' name='imagen' class='form-control' id='imagen-$id'>
                        </div>
                        
                        <!-- Botones para eliminar y actualizar -->
                        <button type='submit' name='update' class='btn btn-warning'>Actualizar</button>
                        <button type='submit' name='delete' class='btn btn-danger'>Eliminar</button>
                    </form>
                </div>
            </div>
        ";
    }
    echo "</div>";
} else {
    echo "<p>No hay noticias disponibles.</p>";
}

$conn->close();
?>
