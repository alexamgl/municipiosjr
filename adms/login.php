<?php
// Conexión a la base de datos
$servername = "localhost";
$db_user = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$db_password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$db_name = "pmsjrcom_dashboard_municipio";

$conn = new mysqli($servername, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Iniciar sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $input_username = $conn->real_escape_string(trim($_POST['username']));
    $input_password = $conn->real_escape_string(trim($_POST['password']));

    // Consulta preparada para obtener al usuario
    $sql = "SELECT id_usuario, nombre_usuario, password_usuario, id_tipo_usuario, id_dependencia 
            FROM usuario WHERE nombre_usuario = '$input_username'";

    /*$stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();*/

    $result = $conn->query($sql);
    // Verificar si el usuario existe
    if ($result && $result->num_rows > 0) {
        //obtener datos usuario
        $user = $result->fetch_assoc();

        // Verificar la contraseña usando password_verify()
        if (password_verify($input_password, $user['password_usuario'])) {
            // La contraseña es correcta
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['username'] = $user['nombre_usuario'];
            $_SESSION['user_type'] = $user['id_tipo_usuario'];
            $_SESSION['dependencia_id'] = $user['id_dependencia'];

            // Redirigir según el tipo de usuario
            if ($user['id_tipo_usuario'] == 1) {
                header("Location: ver_usuarios.php");
            } else {
                header("Location: administrar.php");
            }
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado.'); window.location.href = 'login.html';</script>";
    }
    //$stmt->close();
}

$conn->close();
?>
