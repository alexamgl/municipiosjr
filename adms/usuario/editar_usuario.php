<?php
session_start(); // Iniciar sesión

// Comprobar si la variable de sesión que indica que el usuario está logueado existe
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, redirigir al login
    header("Location: login.html");
    exit();
}
// Obtener el id del usuario a editar
$id_usuario = $_GET['id'];

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

// Obtener los datos del usuario
$sql = "SELECT u.id_usuario, u.nombre_usuario,  u.correo_usuario,u.password_usuario, u.id_dependencia, u.id_tipo_usuario, d.nombre_dependencia, t.nombre_tipo
        FROM usuario u
        JOIN dependencia d ON u.id_dependencia = d.id_dependencia
        JOIN tipo_usuario t ON u.id_tipo_usuario = t.id_tipo_usuario
        WHERE u.id_usuario = $id_usuario";
/*$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();*/

$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Usuario no encontrado");
}

$conn->close();
?>

<!-- Formulario para editar el usuario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<!-- Aquí se cargará el navbar -->


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-center mb-0">Editar Usuario</h4>
                </div>
                <div class="card-body p-4">
                    <form action="guardar_edicion_usuario.php" method="POST">
                        <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">

                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label">
                                <i class="bi bi-person-circle"></i> Nombre
                            </label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" 
                                   value="<?php echo $row['nombre_usuario']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo_usuario" class="form-label">
                                <i class="bi bi-envelope"></i> Correo
                            </label>
                            <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" 
                                   value="<?php echo $row['correo_usuario']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_usuario" class="form-label">
                                <i class="bi bi-lock"></i> Contraseña
                            </label>
                            <input type="text" class="form-control" id="password_usuario" name="password_usuario" placeholder="Dejar en blanco para mantener la actual">
                        </div>

                        <div class="mb-3">
                            <label for="id_dependencia" class="form-label">
                                <i class="bi bi-building"></i> Dependencia
                            </label>
                            <select class="form-select" id="id_dependencia" name="id_dependencia" required>
                                <option value="<?php echo $row['id_dependencia']; ?>">
                                    <?php echo $row['nombre_dependencia']; ?>
                                </option>
                                <?php
                                if ($result_dependencias->num_rows > 0) {
                                    while ($dep = $result_dependencias->fetch_assoc()) {
                                        echo "<option value='" . $dep['id_dependencia'] . "'>" . $dep['nombre_dependencia'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_tipo_usuario" class="form-label">
                                <i class="bi bi-person-badge"></i> Tipo de Usuario
                            </label>
                            <select class="form-select" id="id_tipo_usuario" name="id_tipo_usuario" required>
                                <option value="<?php echo $row['id_tipo_usuario']; ?>">
                                    <?php echo $row['nombre_tipo']; ?>
                                </option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario Normal</option>
                            </select>
                        </div>

                        

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>


</body>
</html>