<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botoncircular.css">
    <link rel="stylesheet" href="css/backtotop.css">
    <link rel="stylesheet" href="fonts/styles.css">
    <title>Secretaría de Desarrollo Social</title>
    <style>
        /* Estilo para tarjetas */
        .card {
            height: auto; /* Altura automática para adaptarse al contenido */
        }
        .card-title {
            color: #0b3b59;
        }
        .card-text {
            color: #212529;
        }
        .row > .col-md-6 {
            padding: 10px; /* Espaciado entre columnas */
        }
        /* Estilo para el mapa */
        .map-container {
            width: 100%;
            max-width: 900px; /* Limita el tamaño máximo en pantallas grandes */
            margin: 0 auto; /* Centra el mapa */
            padding: 20px; /* Espacio alrededor */
        }
        iframe {
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        .img-card {
            width: 100%; /* Asegura que la imagen ocupe todo el ancho de la columna */
            height: auto; /* Mantiene la proporción de la imagen */
        }

        /* Estilo personalizado para el card de objetivo y funciones */
        .custom-card {
            background-color: #fefefe; /* Color de fondo claro */
            border: 1px solid #E8E8E8; /* Borde color oscuro */
            /* Sin bordes redondeados ni sombra */
        }
        .custom-card .card-title {
            font-size: 1.5rem; /* Tamaño de fuente más grande */
            font-weight: bold; /* Negrita */
        }

        .contenedor-banner {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    background-color: white; /* Cambié el fondo a blanco */
    color: #0b3b59; /* Cambié el texto a color negro para que resalte sobre el fondo blanco */
    border-radius: 10px;
    width: 90%; /* Ocupar 80% del ancho de la página */
    margin: 0 auto; /* Centramos el contenedor */
    position: relative; /* Necesario para el icono */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Sombra suave alrededor del contenedor */
}

.contenido-banner {
    flex: 1;
    margin-right: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start; /* Ajuste para que el texto no se estire demasiado */
    text-align: left; /* Alineamos el texto a la izquierda para pantallas pequeñas */
    letter-spacing: 1px; /* Espacio entre las letras */
}

.contenido-banner h1 {
    margin: 0;
    font-size: 1.8rem; /* Ajustamos el tamaño de la fuente */
}

.contenido-banner p {
    margin: 5px 0; /* Reducimos el margen */
    font-size: 1rem; /* Reducimos el tamaño del texto para hacerlo más comprimido */
}

.contenedor-slider {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 500px; /* Reducimos el tamaño del contenedor al de la imagen */
    background-color: white;
    padding: 10px;
    border-radius: 10px;
    position: relative; /* Necesario para posicionar los botones dentro del contenedor */
}

.slider {
    display: flex;
    overflow: hidden;
    width: 100%; /* Ajustamos para que ocupe solo el ancho de la imagen */
}

.slider img {
    width: 100%; /* La imagen ahora ocupa todo el ancho del contenedor */
    cursor: pointer;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.anterior, .siguiente {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10; /* Asegura que los botones estén por encima de la imagen */
}

.anterior {
    left: 10px; /* Ajusta la posición del botón anterior */
}

.siguiente {
    right: 10px; /* Ajusta la posición del botón siguiente */
}

/* Modal */
.modal {
    display: none; /* Oculto por defecto */
    position: fixed;
    z-index: 1000; /* Asegúrate de que se superponga sobre otros elementos */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Permite el scroll si el contenido es muy grande */
    background-color: rgba(0, 0, 0, 0.8); /* Fondo semitransparente oscuro */
}

.imagen-modal {
    margin: auto;
    display: block;
    max-width: 90%; /* Ajusta el tamaño de la imagen en proporción a la pantalla */
    max-height: 90%; /* Ajusta la altura máxima de la imagen */
}

.cerrar {
    position: absolute;
    top: 10px;
    right: 25px;
    color: #fff;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.cerrar:hover,
.cerrar:focus {
    color: #ccc;
    text-decoration: none;
    cursor: pointer;
}



/* Media Queries para pantallas más pequeñas */
@media (max-width: 768px) {
    .contenedor-banner {
        flex-direction: column; /* Apilamos los elementos */
        width: 95%; /* Hacemos que el contenedor ocupe más ancho en pantallas pequeñas */
        padding: 10px;
    }

    .contenedor-slider {
        width: 100%; /* La imagen ocupará el 100% de la pantalla en pantallas pequeñas */
    }

    .contenido-banner h1 {
        font-size: 1.5rem; /* Reducimos el tamaño del título */
    }

    .contenido-banner p {
        font-size: 0.9rem; /* Reducimos el tamaño del texto del párrafo */
    }
}

@media (max-width: 480px) {
    .contenedor-banner {
        width: 100%; /* Aseguramos que ocupe el 100% en pantallas muy pequeñas */
    }

    .contenido-banner h1 {
        font-size: 1.2rem; /* Reducimos aún más el tamaño del título */
    }

    .contenido-banner p {
        font-size: 0.8rem; /* Reducimos aún más el tamaño del párrafo */
    }
}


    </style>
</head>
<body>
    <!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>

<!-- Contenido principal de la página -->
<div class="container mt-4">
    <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Secretaría de Desarrollo Social</h1>
    <!-- Nueva tarjeta para el objetivo y funciones de la Secretaría -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">Objetivo</h5>
                    <p class="card-text">Reducir la desigualdad social a través del combate a la pobreza, facilitar el acceso a bienes, servicios y
                        oportunidades básicas para el mejoramiento de la calidad de vida de la población, así como fomentar la
                        participación ciudadana para el diagnóstico, planeación y toma de decisiones en los asuntos públicos
                        para el desarrollo social del municipio de San Juan del Río.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Secretaría de Desarrollo Social</h5>
                    <p class="card-text"><strong>Dirección:</strong> Av. Paso de los Guzmán, No. 24, Barrio de la Concepción</p>
                    <p class="card-text"><strong>Contacto:</strong> (427) 689 0012 Ext. 804</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMap1">Ver en Google Maps</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="/images/dependencias/DESARROLLO SOCIAL.png" alt="Descripción de la imagen" class="img-card">
        </div>
<br>
<br>    
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
        <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Áreas</h1>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Programas, Proyectos, <br>Evaluación y Conclusión</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Promover la participación social democrática en la administración de programas y proyectos que
                        coadyuven a elevar el nivel de vida de los sectores sociales más vulnerables del Municipio.
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Participación Ciudadana</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Impulsar y facilitar la Participación Ciudadana corresponsable e incluyente en el quehacer público del
                        municipio, contribuyendo al fortalecimiento del tejido social en San Juan del Río.
                </div>
                </div>
            </div>
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
    $sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias WHERE id_dependencia=11 ORDER BY fecha_publicacion DESC LIMIT 10";
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

<!-- Modales para Google Maps -->
<div class="modal fade" id="modalMap1" tabindex="-1" aria-labelledby="modalMap1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMap1Label">Secretaría de Desarrollo Social</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3739.91278172683!2d-100.00208702476077!3d20.386485681106965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d30b1bf1d83c0b%3A0x18724ede5e589778!2sPresidencia %20Municipal%20de%20San%20Juan%20del%20R%C3%ADo.!5e0!3m2!1ses-419!2smx!4v1730826131890!5m2!1ses-419!2smx" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="row mt-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div id="footerContainer"></div>
<!-- Botón "Back to Top" -->
<button id="backToTop" class="btn" title="Volver arriba">
    <i class="bi bi-arrow-up"></i>
</button> 

<div class="modal fade" id="modalMap2" tabindex="-1" aria-labelledby="modalMap2Label" aria-hidden="true">
    <!-- Contenido del modal 2 -->
</div>

<div class="modal fade" id="modalMap3" tabindex="-1" aria-labelledby="modalMap3Label" aria-hidden="true">
    <!-- Contenido del modal 3 -->
</div>

<div class="modal fade" id="modalMap4" tabindex="-1" aria-labelledby="modalMap4Label" aria-hidden="true">
    <!-- Contenido del modal 4 -->
</div>

<script>
    fetch('partials/navbar.html')
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

<script src="js/botonmas.js"></script>
<script src="js/backtotop.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>