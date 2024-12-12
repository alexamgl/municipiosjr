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
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
<!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>

<!-- Dashboard Formulario para Subir Noticias -->
<div class="dashboard-container">
    <h2>Subir Noticias</h2>
        <div class="form-group">
            <label for="newsTitle">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Escribe el título aquí" required>
        </div>
        
        <div class="form-group">
            <label for="newsBody">Contenido:</label>
			<div id="editor" style="height: 300px; margin-bottom: 20px;" aria-placeholder="Escribre aqui">
				<!-- Texto inicial opcional -->
			</div>
            <input type="hidden" name="newsBody" id="newsBody">
        </div>

        <div class="text-center">
            <button onclick="guardarContenido()" class="btn btn-submit">Subir Noticia</button>
        </div>
</div>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<!-- Aquí se cargará el footer -->
<div id="footerContainer"></div>

<!-- Enlace al archivo de scripts externo -->
<script src="scripts.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>
