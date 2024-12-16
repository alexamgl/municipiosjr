<?php
session_start(); // Iniciar sesión

// Comprobar si la variable de sesión que indica que el usuario está logueado existe
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, redirigir al login
    header("Location: login.html");
    exit();
}

// Conexión a la base de datos
$servername = "localhost";
$db_user = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
$db_password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
$db_name = "pmsjrcom_dashboard_municipio";

// Crear conexión
$conn = new mysqli($servername, $db_user, $db_password, $db_name);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo_usuario = $_POST['correo_usuario'];
    $password_usuario = $_POST['password_usuario']; // Considera cifrar la contraseña
    $id_dependencia = $_POST['id_dependencia'];
    $id_tipo_usuario = $_POST['id_tipo_usuario']; // Suponemos que es 1 para admin o 2 para usuario normal

    // Encriptar la contraseña (opcional pero recomendado)
    $password_hashed = password_hash($password_usuario, PASSWORD_DEFAULT);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuario (nombre_usuario, password_usuario, correo_usuario, id_dependencia, id_tipo_usuario)
            VALUES ('$nombre_usuario', '$password_hashed', '$correo_usuario', $id_dependencia, $id_tipo_usuario)";

    /*$stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $nombre_usuario, $password_hashed, $correo_usuario, $id_dependencia, $id_tipo_usuario);*/

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario insertado exitosamente.'); window.location.href = 'ver_usuarios.php';</script>";
    } else {
        echo "<script>alert('Error al insertar el usuario.'); window.location.href = 'ver_usuarios.php';</script>";
    }

    //$stmt->close();
}

// Obtener las dependencias para el formulario
$sql_dependencias = "SELECT id_dependencia, nombre_dependencia FROM dependencia";
$result_dependencias = $conn->query($sql_dependencias);

// Cerrar conexión
$conn->close();
?>


<!-- Formulario HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>

<div class="container mt-5">
    <h2>Registrar Nuevo Usuario</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
        </div>
        <div class="form-group">
            <label for="correo_usuario">Correo de Usuario:</label>
            <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" required>
        </div>
        <div class="form-group">
            <label for="password_usuario">Contraseña:</label>
            <input type="password" class="form-control" id="password_usuario" name="password_usuario" required>
        </div>
        <div class="form-group">
            <label for="id_dependencia">Dependencia:</label>
            <select class="form-control" id="id_dependencia" name="id_dependencia" required>
                <option value="">Seleccionar dependencia</option>
                <?php
                if ($result_dependencias->num_rows > 0) {
                    while ($row = $result_dependencias->fetch_assoc()) {
                        echo "<option value='" . $row['id_dependencia'] . "'>" . $row['nombre_dependencia'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_tipo_usuario">Tipo de Usuario:</label>
            <select class="form-control" id="id_tipo_usuario" name="id_tipo_usuario" required>
                <option value="1">Administrador</option>
                <option value="2">Usuario Normal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
    </form>
</div>
<br>
<br>
<div id="footerContainer"></div>
<script>
    fetch('partials/navbaradmin.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbarContainer').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar el navbar:', error));
    fetch('partials/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footerContainer').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar el footer:', error));

        </script>
</body>
</html>
