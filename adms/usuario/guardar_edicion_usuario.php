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

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
    $nombre_usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : null;
    $correo_usuario = isset($_POST['correo_usuario']) ? $_POST['correo_usuario'] : null;
    $id_dependencia = isset($_POST['id_dependencia']) ? $_POST['id_dependencia'] : null;
    $id_tipo_usuario = isset($_POST['id_tipo_usuario']) ? $_POST['id_tipo_usuario'] : null;
    $password_usuario = isset($_POST['password_usuario']) ? $_POST['password_usuario'] : null;

    // Validar los datos (puedes hacer más validaciones dependiendo de lo que necesites)
    if (empty($id_usuario) || empty($nombre_usuario) || empty($correo_usuario) || empty($id_dependencia) || empty($id_tipo_usuario)) {
        echo "Todos los campos son requeridos.";
        exit;
    }

    // Sanitizar los datos para evitar inyecciones SQL
    $id_usuario = $conn->real_escape_string($id_usuario);
    $nombre_usuario = $conn->real_escape_string($nombre_usuario);
    $correo_usuario = $conn->real_escape_string($correo_usuario);
    $id_dependencia = $conn->real_escape_string($id_dependencia);
    $id_tipo_usuario = $conn->real_escape_string($id_tipo_usuario);

    // Iniciar la consulta SQL
    $sql = "UPDATE usuario 
            SET nombre_usuario = '$nombre_usuario', correo_usuario = '$correo_usuario', id_dependencia = '$id_dependencia', id_tipo_usuario = '$id_tipo_usuario'";

    // Si el campo de contraseña no está vacío, actualizar la contraseña
    if (!empty($password_usuario)) {
        // Encriptar la nueva contraseña
        $password_hashed = password_hash($password_usuario, PASSWORD_DEFAULT);
        $sql .= ", password_usuario = '$password_hashed'";
    }

    // Completar la consulta con la condición WHERE
    $sql .= " WHERE id_usuario = '$id_usuario'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado exitosamente.";
        // Redirigir a la página de usuarios después de la actualización
        header("Location: ../ver_usuarios.php");
        exit;
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
