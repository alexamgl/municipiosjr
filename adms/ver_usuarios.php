<?php
session_start(); // Iniciar sesión

// Comprobar si la variable de sesión que indica que el usuario está logueado existe
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, redirigir al login
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Municipio San Juan del Río</title>
    <style>
        /* Estilos existentes */
        .card {
            height: 220px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
            box-shadow: 0 0 10px rgba(77, 163, 255, 0.5);
        }

        .card-icon img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .card-title {
            color: #ef5196;
        }

        .card-text {
            color: #212529;
        }

        .row > .col-md-3 {
            padding: 10px;
        }

        .horizontal-card {
            display: flex;
            align-items: center;
            height: auto;
        }

        .horizontal-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-right: 15px;
        }

        .horizontal-card .card-body {
            flex-grow: 1;
        }

        #backToTop {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0b3b59;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #backToTop:hover {
            background-color: #007bff;
        }

        .card {
            overflow: hidden;
            max-height: 500px;
        }

        .card-img-top {
            object-fit: cover;
            max-height: 200px;
            width: 100%;
        }

        .card-body {
            overflow: hidden;
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            max-height: 200px;
            overflow: hidden;
            position: relative;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>

<br>

<div class="container mt-5">
    <h1 class="text-center mb-4">Usuarios</h1>
    <div class="table-responsive">
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Nombre de dependencia</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
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

// Consulta con JOIN para obtener nombres de dependencia y tipo de usuario
$sql = "SELECT u.id_usuario, u.nombre_usuario, u.correo_usuario,u.password_usuario, d.nombre_dependencia, t.nombre_tipo
        FROM usuario u
        JOIN dependencia d ON u.id_dependencia = d.id_dependencia
        JOIN tipo_usuario t ON u.id_tipo_usuario = t.id_tipo_usuario";
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

// Verificar si hay usuarios
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <th scope='row'>" . $row['id_usuario'] . "</th>
                <td>" . $row['nombre_usuario'] . "</td>
                <td>" . $row['correo_usuario'] . "</td>
                <td>" . $row['password_usuario'] . "</td>
                <td>" . $row['nombre_dependencia'] . "</td>
                <td>" . $row['nombre_tipo'] . "</td>
                <td>
                    <a href='usuario/editar_usuario.php?id=" . $row['id_usuario'] . "' class='btn btn-warning'>Editar</a>
<a href='javascript:void(0);' class='btn btn-danger' onclick='eliminarUsuario(" . $row['id_usuario'] . ")'>Eliminar</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay usuarios disponibles.</td></tr>";
}

$conn->close();
?>


        </tbody>
    </table>
    </div>
</div>

<br><br>

<!-- Aquí se cargará el footer -->
<div id="footerContainer"></div>

<!-- Botón Back to Top -->
<button id="backToTop">↑ Volver arriba</button>

<script>
function eliminarUsuario(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
        // Solicitud AJAX para eliminar el usuario
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'usuario/eliminar_usuario.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status == 200) {
                if (xhr.responseText == 'success') {
                    alert('Usuario eliminado exitosamente');
                    location.reload(); // Recargar la página después de eliminar
                } else {
                    alert('Error al eliminar el usuario');
                }
            } else {
                alert('Error al eliminar el usuario');
            }
        };
        xhr.send('id=' + id); // Enviar el ID del usuario
    }
}

    // Cargar navbar
    fetch('partials/navbaradmin.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbarContainer').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar el navbar:', error));

    // Cargar footer
    fetch('partials/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footerContainer').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar el footer:', error));

    // Mostrar u ocultar el botón "Back to Top"
    window.onscroll = function() {
        const backToTopButton = document.getElementById('backToTop');
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    };

    // Función para desplazarse suavemente hacia arriba
    document.getElementById('backToTop').onclick = function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>
