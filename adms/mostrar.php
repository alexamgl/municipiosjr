
<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Municipio San Juan del Río</title>
    <style>
    
        /* Estilo para tarjetas (verticales) */
        .card {
            height: 220px; /* Altura estándar para todas las tarjetas */
            transition: transform 0.2s, box-shadow 0.2s; /* Transición suave para el efecto hover */
        }

        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
            box-shadow: 0 0 10px rgba(77, 163, 255, 0.5);
        }

        .card-icon img {
            width: 80px; /* Ancho estándar de los íconos */
            height: 80px; /* Altura estándar de los íconos */
            object-fit: cover; /* Ajustar la imagen dentro del contenedor */
        }

        .card-title {
            color: #ef5196; /* Color del título */
        }

        .card-text {
            color: #212529; /* Color del texto */
        }

        /* Espaciado entre columnas y tarjetas */
        .row > .col-md-3 {
            padding: 10px;
        }

        /* Estilo para tarjetas horizontales */
        .horizontal-card {
            display: flex;
            align-items: center;
            height: auto;
        }

        .horizontal-card img {
            width: 120px; /* Ancho de las imágenes en tarjetas horizontales */
            height: 120px; /* Altura uniforme */
            object-fit: cover;
            margin-right: 15px;
        }

        .horizontal-card .card-body {
            flex-grow: 1;
        }

        /* Estilo del botón "Back to Top" */
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
            transition: background-color 0.3s ease; /* Transición suave para el hover */
        }

        /* Efecto cuando el mouse pasa por encima del botón */
        #backToTop:hover {
            background-color: #007bff;
        }

        .card {
    overflow: hidden; /* Previene que el contenido se salga del card */
    max-height: 500px; /* Limita la altura máxima del card */
}

.card-img-top {
    object-fit: cover; /* Mantiene la imagen dentro del card sin deformarse */
    max-height: 200px; /* Limita la altura de la imagen para que no sea demasiado alta */
    width: 100%; /* Asegura que la imagen ocupe todo el ancho del card */
}

.card-body {
    overflow: hidden; /* Previene que el contenido textual se salga del card */
}

.card-text {
    max-height: 200px; /* Limitar la altura del cuerpo */
    overflow: hidden; /* Ocultar el contenido que exceda el tamaño */
    position: relative;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
}

.card-text span {
    display: inline;
}

.btn {
    margin-top: 10px;
}



    </style>
    </style>
</head>
<body>

<!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>

<br>

<div class="container mt-5">
    <h1 class="text-center mb-4">Noticias</h1>
    
        <!-- Aquí se insertarán las noticias desde PHP -->
        <?php include 'noticiones.php'; ?>
    </div>
</div>

<br><br>
<div id="footerContainer"></div>

<!-- Aquí se cargará el footer -->

<!-- Botón Back to Top -->
<button id="backToTop">↑ Volver arriba</button>

<script>
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
