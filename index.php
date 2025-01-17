<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/inicio.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/styles.css">
    <title>Municipio San Juan del Río</title>

    <style>
         #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner-border {
            width: 4rem;
            height: 4rem;
        }
    </style>
</head>
<body>

    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

<!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>
<!-- Mensaje emergente -->
<!-- <div id="overlay"></div>
<div id="popup">
    <div class="text-center mb-3">
        <i class="bi bi-exclamation-triangle-fill" style="color: #ffc107; font-size: 50px; margin-right: 10px;"></i>
    </div>
    <h3 style="font-weight: 900;">Portal en Desarrollo</h3>
    <p style="font-weight: bold;">Estamos trabajando para mejorar tu experiencia.</p>
    <button onclick="closePopup()" class="close-button">Cerrar</button>

    
</div> -->

<!-- div para hacer que el contenido solo sea visible, no clickeable -->
<div style="pointer-events: none;"> 
    <a class="weatherwidget-io" href="https://forecast7.com/es/20d40n99d99/san-juan-del-rio/" data-label_1="SAN JUAN DEL RÍO" data-label_2="Clima" data-font="Arial Rounded MT Bold" data-mode="Current" data-days="5" data-theme="pure" data-basecolor="#f8f9fa" data-textcolor="#0b3b59"></a>
</div>

 
<!-- Banner de imágenes con carrusel -->
<div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="3" aria-label="Slide 4"></button> <!-- Nuevo indicador -->
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="https://municipio.azurewebsites.net/login.aspx?ReturnUrl=%2fPagoConceptos.aspx" class="text-decoration-none">
            <img src="images/sliders/slide1.jpg" class="d-block w-100" alt="Imagen 1" >
        </a>
      </div>
      <div class="carousel-item">
        <img src="images/sliders/slide2.jpg" class="d-block w-100" alt="Imagen 2">
      </div>
      <div class="carousel-item">
        <a href="padron_proveedores.html" class="text-decoration-none" target="_blank">
            <img src="images/sliders/PROVEEDORESs.jpeg" class="d-block w-100" alt="Imagen 3" >
        </a>
    </div>
      <div class="carousel-item">
        <img src="images/sliders/slide3.jpg" class="d-block w-100" alt="Imagen 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
</div>  



<!-- Contenido principal de la página -->
<div class="container mt-4" id="tramites">
    <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">CONSULTAS FRECUENTES</h1>
    <div class="row mt-4">
        <div class="col-md-3">
            <a href="#" class="text-decoration-none">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="card-icon">
                            <img src="images/iconos/DESTA_Mesa de trabajo 1 pago de predial.png" alt="Icono de casa" class="img-fluid">
                        </div>
                        <br>
                        <h5 class="card-title" style="font-weight: bold;">Consultar predial</h5>
                        <p class="card-text">Descripción breve sobre la casa y sus características.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://municipio.azurewebsites.net/login.aspx?ReturnUrl=%2fPagoConceptos.aspx" class="text-decoration-none">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="card-icon">
                            <img src="images/iconos/DESTA_Mesa de trabajo 1 copia predial.png" alt="Icono de pago" class="img-fluid">
                        </div>
                        <br>
                        <h5 class="card-title" style="font-weight: bold;">Pago de Predial</h5>
                        <p class="card-text">Información sobre métodos de pago y opciones disponibles.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://municipio.azurewebsites.net/login.aspx?ReturnUrl=%2fPagoConceptos.aspx" class="text-decoration-none">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="card-icon">
                            <img src="images/iconos/DESTA_Mesa de trabajo 1 copia 2.png" alt="Icono de agua" class="img-fluid">
                        </div>
                        <br>
                        <h5 class="card-title" style="font-weight: bold;">Pago de Acuática</h5>
                        <p class="card-text">Aquí puedes realizar el pago de tu servicio.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="padron_proveedores.html" target="_blank" class="text-decoration-none">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="card-icon">
                            <img src="images/iconos/DESTA_Mesa de trabajo 1 copia 3.png" alt="Icono de seguro" class="img-fluid">
                        </div>
                        <br>
                        <h5 class="card-title" style="font-weight: bold;">Padrón de Proveedores</h5>
                        <p class="card-text">Información y registro para el pertenecer al padrón.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">TRÁMITES</h2>
    <!-- Tarjetas horizontales -->
    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <a href="https://municipio.azurewebsites.net/login.aspx?ReturnUrl=%2fPagoConceptos.aspx" style="text-decoration: none;">
            <div class="card horizontal-card">
                <br>
                <img src="images/iconos/DESTA_Mesa de trabajo 1 copia 2.png" alt="Imagen 1">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;">Pago de Acuática</h5>
                    <p class="card-text" style="font-weight: normal;">Realiza el pago del servicio de la acuática de forma rápida y fácil.</p>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="https://municipio.azurewebsites.net/login.aspx?ReturnUrl=%2fPagoConceptos.aspx" style="text-decoration: none;">
            <div class="card horizontal-card">
                <br>
                <img src="images/iconos/DESTA_Mesa de trabajo 1 pago de predial.png" alt="Imagen 2">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;">Pago de Predial</h5>
                    <p class="card-text" style="font-weight: normal;">Consulta y realiza el pago del predial de forma rápida y fácil.</p>
                </div>
            </div>
        </a>
        </div>
    </div>
</div> 

<div id="miModal" class="modal">
    <span class="cerrar" onclick="cerrarModal()">&times;</span>
    <img class="imagen-modal" id="imgModal">
</div>

<script>
    let diapositivaActual = 0;
    const diapositivas = document.querySelectorAll('.diapositiva');

    function mostrarDiapositiva(indice) {
        if (indice >= diapositivas.length) diapositivaActual = 0;
        if (indice < 0) diapositivaActual = diapositivas.length - 1;
        
        diapositivas.forEach((diapositiva, i) => {
            diapositiva.style.display = i === diapositivaActual ? 'block' : 'none';
        });
    }

    function moverDiapositiva(n) {
        mostrarDiapositiva(diapositivaActual += n);
    }

    function abrirModal(srcImagen) {
        const modal = document.getElementById('miModal');
        const imagenModal = document.getElementById('imgModal');
        modal.style.display = 'block';
        imagenModal.src = srcImagen;
    }

    function cerrarModal() {
        document.getElementById('miModal').style.display = 'none';
    }

    // Inicializar el slider
    mostrarDiapositiva(diapositivaActual);

</script>

<!-- Banner con efecto de despliegue en el contenedor -->
<div class="container mt-5">
    <a href="innovacion.html">
    <div class="banner-container">
        <img src="images/iconos/banner sj digital.png" alt="Banner Promocional" class="banner-img">
    </div>
    </a>
</div>





<!-- Estilo para el banner con efecto de despliegue en el contenedor -->


<br>
<h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">PRESIDENCIA</h2>

<div class="map-container my-5">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463.98985962658435!2d-100.00586101339918!3d20.39262842967752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d30c91206043d9%3A0xf641977613738769!2sCentro%20C%C3%ADvico%20Municipal%20San%20Juan%20Del%20R%C3%ADo!5e1!3m2!1ses-419!2smx!4v1730742195473!5m2!1ses-419!2smx" 
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v15.0" nonce="QE3LWUkE"></script>
<div class="container mt-4">
	<div class="row mt-4">
	<div class="col-md-6 mb-3">
		<div class="fb-page my-5" data-href="https://www.facebook.com/presidenciaSJR/" data-tabs="timeline" data-width="500" data-height="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
	</div>
	<div class="col-md-6 mb-3">
		<div class="fb-page my-5" data-href="https://www.facebook.com/robertocabrerav/" data-tabs="timeline" data-width="500" data-height="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
	</div>
	</div>
</div>
<br>
<div style="padding: 80px;">
<h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">NOTICIAS.</h2>
<br>
<?php
include 'conexion.php';

// Mostrar todas las noticias
$sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias ORDER BY fecha_publicacion DESC LIMIT 10";
$result = $conn->query($sql);
// Verificar si hay noticias disponibles
if ($result->num_rows > 0) {
    echo "<div class='news-container'>"; // Contenedor principal para el grid
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $titulo = $row['titulo'];
        $cuerpo = $row['cuerpo']; // Obtener todo el contenido del cuerpo
        $fecha = date("d/m/Y", strtotime($row['fecha_publicacion']));
        
        $cuerpo = str_replace('\\', '', $cuerpo);
        // Truncar el cuerpo a 150 caracteres para mostrar solo un fragmento
        $cuerpo_truncado = substr($cuerpo, 0, 150); 
        echo "
            <div class='news-item'>
                <div class='news-content' data-bs-toggle='modal' data-bs-target='#newsModal' data-title='$titulo' data-content='$cuerpo'>
                    <p class='noticia-fecha'>Publicación: $fecha</p>
                    <h3 class='news-title'>$titulo</h3>
                    <p class='news-body'>
                        $cuerpo_truncado...
                    </p>
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

<!-- Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsModalLabel">Título de la Noticia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="newsModalBody">Cuerpo de la noticia</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Estilos personalizados -->
<style>
    .news-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Acomodo responsivo */
        gap: 20px;
        justify-items: center;
    }

    .news-item {
        background-color: #f5f5f5;
        padding: 20px;
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        min-height: 300px;
        max-height: 350px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden; /* Evitar desbordamientos */
    }

    .news-item:hover {
        transform: scale(1.02);
    }

    .news-content {
        cursor: pointer;
    }

    .noticia-fecha {
        color: #888;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .news-title {
        font-size: 20px;
        margin-bottom: 10px;
        color: #ce1d81;
    }

    .news-body {
        font-size: 14px;
        color: #333;
        flex-grow: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4; /* Limitar a 4 líneas */
        -webkit-box-orient: vertical;
    }

    /* Estilos para el modal */
    #newsModal img {
        max-width: 100%;  
        height: auto;  
        display: block;
        margin: 0 auto;
    }
</style>

<script>
    // Capturar los datos del modal cuando se activa
    var newsModal = document.getElementById('newsModal');
    newsModal.addEventListener('show.bs.modal', function (event) {
        var card = event.relatedTarget; 
        var title = card.getAttribute('data-title'); 
        var content = card.getAttribute('data-content'); 

        var modalTitle = newsModal.querySelector('.modal-title');
        var modalBody = newsModal.querySelector('#newsModalBody');

        modalTitle.textContent = title;
        modalBody.innerHTML = content; 
    });
</script>

</div>


<br>

<!-- Botón de Chatbot -->
<div class="chatbot-indicator" id="chatbotIndicator">
    <span class="chatbot-text">Proximamente Paloma Asistente virtual</span>
    <div id="arrow-indicator"></div>
</div>

<!-- Botón de Chatbot -->
<button id="chatbotButton" title="Abrir Chatbot">
    <i class="bi bi-chat-dots-fill"></i>
</button>
<!-- Ventana de Chatbot -->

<div id="chatbotWindow" class="chat-window">
    <div class="chat-header">
        <span>Paloma Asistente Virtual.</span>
        <button onclick="closeChat()" class="close-chat-button">&times;</button>
    </div>
    <div class="chat-content">
        <p>¡Hola!, Estamos trabajando en mejoras para el sitio</p>
    </div>
    <!-- <div class="chat-input">
        <input type="text" id="userInput" placeholder="Escribe un mensaje...">
        <button onclick="sendMessage()">Enviar</button>
    </div> -->
</div>




<div id="footerContainer"></div>
<!-- Botón "Back to Top" -->
<button id="backToTop" class="btn" title="Volver arriba">
    <i class="bi bi-arrow-up"></i>
</button> 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="js/ini.js"></script>
<script>
    // Mostrar el preloader hasta que la página esté completamente cargada
    window.addEventListener('load', function() {
        // Oculta el preloader
        document.getElementById('preloader').style.display = 'none';
        // Muestra el contenido
        document.getElementById('content').style.display = 'block';
    });
</script>
</body>
</html>