<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botoncircular.css">
    <link rel="stylesheet" href="css/backtotop.css">
    <link rel="stylesheet" href="fonts/styles.css">
    <title>Secretaría de Desarrollo Integral y Económico</title>
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
    </style>
</head>
<body>
    <!-- Aquí se cargará el navbar -->
<div id="navbarContainer"></div>

<!-- Contenido principal de la página -->
<div class="container mt-4">
    <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Secretaría de Desarrollo Integral y Económico</h1>
    <!-- Nueva tarjeta para el objetivo y funciones de la Secretaría -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">Objetivo</h5>
                    <p class="card-text">Programar, gestionar, coordinar y ejecutar los programas institucionales para el desarrollo sustentable,
                        económico, empresarial y de fomento integral en beneficio de los habitantes del Municipio.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Secretaría de Desarrollo Integral y Económico</h5>
                    <p class="card-text"><strong>Dirección:</strong> Portal de Diezmo, Av. Benito Juárez No.15 Ote., Col. Centro, San Juan del Río, Qro.</p>
                    <p class="card-text"><strong>Contacto:</strong> (427) 186 2882</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMap1">Ver en Google Maps</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="/images/dependencias/DESARROLLO INTEGRAL Y ECONÓMICO.png" alt="Descripción de la imagen" class="img-card">
        </div>
        <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Áreas</h1>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Sub-Secretaría de Desarrollo Integral</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Desarrollar actividades relacionadas con el deporte y cultura que fortalezcan las capacidades humanas de los habitantes del municipio.
                <br><br>
                <strong>Dirección: </strong>Portal de Diezmo, Av. Benito Juárez No.15 Ote., Col. Centro, San Juan del Río, Qro. San Juan del Río, Qro.</div>

            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Sub-Secretaría Desarrollo Económico, Negocios, Empresarial y Turismo</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Ejecutar los programas institucionales en materia de desarrollo económico y turístico que fortalezcan
                        las capacidades y vocaciones productivas del municipio, consolidando así una política con los
                        sectores industrial, comercial, turístico y de servicios.
                        <br><br>
                        <strong>Dirección: </strong>Carretera Panamericana a Querétaro No.232, La Venta, Plaza Punta Victoria, San Juan del Río, Qro.
                </div>


                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección del Deporte</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Propiciar la práctica deportiva, para detonar el impulso y fomento de una cultura física, en el Municipio de San Juan del Río, Querétaro.
                    <br><br>
                    <strong>Dirección: </strong>Acuática Gómez Morin, Alfonso Pasiño s/n, Centro, 76807 San Juan del Río, Qro.
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de la Juventud</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Procurar el desarrollo armónico e integral de las juventudes en un marco de inclusión y equidad de oportunidades políticas, sociales, económicas y culturales.
                    <br><br>
                    <strong>Dirección: </strong>Ciudad Vive Oriente, Av. de las Garzas 57, Indeco, San Juan del Río, Qro.
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Bellas Artes</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Promover y dar seguimiento a las acciones para la ejecución de las actividades Artísticas y Culturales de nuestro Municipio.
                    <br><br>
                    <strong>Dirección: </strong>Portal de Diezmo, Av. Benito Juárez No.15 Ote., Col. Centro, San Juan del Río, Qro. San Juan del Río, Qro.</div>    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Fomento a la Inversión y Desarrollo Empresarial</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Generar condiciones para el fomento de inversión para el desarrollo empresarial del municipio de
                        manera sustentable, mejorando la gestión de la cadena de suministro y alineando los objetivos del
                        sector económico y empresarial, con la Administración Pública Municipal priorizando la generación de
                        empleos de calidad y con visión a largo plazo, así como gestionar el establecimiento de comercios
                        bajo la política de mejora regulatoria.
                        <br><br>
                <strong>Dirección: </strong>Carretera Panamericana a Querétaro No.232, La Venta, Plaza Punta Victoria, San Juan del Río, Qro.</div>

                </div>
                </div>
        </div> 
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Desarrollo Mipymes y Regional</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Beneficiar mediante la gestión, asesoría y ejecución de programas a las micro, pequeñas y medianas
                        empresas del municipio para su operación, capacitación y regulación.
                        <br><br>
                <strong>Dirección: </strong>Carretera Panamericana a Querétaro No.232, La Venta, Plaza Punta Victoria, San Juan del Río, Qro.</div>
                        
                </div>
                </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Desarrollo Turismo</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Favorecer el desarrollo y cultura turística mediante el impulso de mecanismos e instrumentos de
                        política pública que contribuyan al crecimiento del sector turístico; así como la capacitación, promoción
                        de eventos, congresos y convenciones para difundir la riqueza histórica, cultural, natural y turística del
                        municipio.
                        <br><br>
                    <strong>Dirección: </strong>Portal de Diezmo, Av. Benito Juárez No.15 Ote., Col. Centro, San Juan del Río, Qro. San Juan del Río, Qro.</div>    
                </div>
                </div>
        </div>
 
    </div>
</div>

<!-- Modales para Google Maps -->
<div class="modal fade" id="modalMap1" tabindex="-1" aria-labelledby="modalMap1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMap1Label">Secretaría de Desarrollo Integral y Económico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3121.4610363532847!2d-99.99883442571239!3d20.38661540952582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d30c836456e7fb%3A0x87c2b13c57c714ec!2sPortal%20del%20Diezmo!5e1!3m2!1ses-419!2smx!4v1734103040436!5m2!1ses-419!2smx" 
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
</div>

<br>



<!-- Seccion de Noticias -->
<div style="padding: 80px;">
    <h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">NOTICIAS.</h2>
    <br>
    <?php
    include 'conexion.php';
    
    // Mostrar todas las noticias
    $sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias WHERE id_dependencia=6 ORDER BY fecha_publicacion DESC LIMIT 10";
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