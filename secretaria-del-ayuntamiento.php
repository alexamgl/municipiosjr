<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botoncircular.css">
    <link rel="stylesheet" href="css/backtotop.css">
    <link rel="stylesheet" href="fonts/styles.css">
    <title>Secretaría del Ayuntamiento</title>
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
    <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Secretaría del Ayuntamiento</h1>
    
    <!-- Nueva tarjeta para el objetivo y funciones de la Secretaría -->
    <div class="row mt-4" >
        <div class="col-md-12">
            <div class="card custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">Objetivo</h5>
                    <p class="card-text">Contribuir a la eficaz organización y desarrollo de las Sesiones de Cabildo, así como de las Comisiones
                        Permanentes de Dictamen. Así también, será la instancia auxiliar para el despacho de los asuntos
                        inherentes a las funciones del Ayuntamiento </p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    
               <!-- Seleccionar DP -->
               <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Trámites</h5>
                        <!-- Botón para abrir el modal -->
                        <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalPC">+</button>
                    </div>
                </div>
            </div>
            
    <!-- Modal de Coordinación -->
            <div class="modal fade" id="modalPC" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCoordinacionLabel">Trámites</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <strong>Listado de los trámites que expide la
                                    Secretaria del Ayuntamiento del Municipio de San Juan del Río, Querétaro.</strong>
                                    <div class="col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                        
                                                <!-- Tabla de una columna con los trámites -->
                                                <div class="table-responsive mt-3">
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Trámites Disponibles</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr><td>1. Credencial de identificación para menor de edad</td></tr>
                                                            <tr><td>2. Credencial de identificación para mayor</td></tr>
                                                            <tr><td>3. Constancia de residencia para mayor</td></tr>
                                                            <tr><td>4. Constancia de residencia para menor</td></tr>
                                                            <tr><td>5. Constancia de residencia para registro extemporáneo</td></tr>
                                                            <tr><td>6. Constancia de residencia para registrar</td></tr>
                                                            <tr><td>7. Constancia de fe de vida</td></tr>
                                                            <tr><td>8. Constancia de concubinato</td></tr>
                                                            <tr><td>9. Constancia de identidad para mayor</td></tr>
                                                            <tr><td>10. Constancia de dependencia económica</td></tr>
                                                            <tr><td>11. Constancia de identidad para menor</td></tr>
                                                            <tr><td>12. Constancia de identidad u origen</td></tr>
                                                            <tr><td>13. Constancia de comunidad</td></tr>
                                                            <tr><td>14. Constancia de ingresos</td></tr>
                                                            <tr><td>15. Cambio de uso de suelo</td></tr>
                                                            <tr><td>16. Trámite para la autorización para la obtención de licencia municipal de funcionamiento para giros con venta de bebidas alcohólicas</td></tr>
                                                            <tr><td>17. Trámite para la autorización de establecimientos mercantiles de giros diversos (hoteles, moteles, casa de huéspedes, juegos mecánicos, electromecánicos, eléctricos, de video, combustible, solventes, materiales explosivos, o altamente inflamables, casas de empeños, y todas aquellas que signifiquen vulnerabilidad social por sus condiciones conforme lo determine el Ayuntamiento)</td></tr>
                                                            <tr><td>18. Trámite para la obtención de dictamen sobre derecho del tanto de predios ejidales. </td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                                
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>            
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>



    

    <div class="row mt-4" style="padding: 65px">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Secretaría del Ayuntamiento</h5>
                    <p class="card-text"><strong>Dirección:</strong> Av. Paso de los Guzmán, No. 24, Barrio de la Concepción</p>
                    <p class="card-text"><strong>Contacto:</strong> (427) 689 0012 Ext. 201</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMap1">Ver en Google Maps</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <img src="/images/dependencias/AYUNTAMIENTO.png" alt="Descripción de la imagen" class="img-card">
        </div>
        <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Áreas</h1>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Coordinación</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Coordinar el funcionamiento de la secretaría y proporcionar asesoría a las áreas y a la persona titular
                        de la Secretaría.
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Asuntos de Cabildo</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Contribuir a la eficaz organización y desarrollo de las Sesiones de Cabildo, así como de las Comisiones
                        Permanentes de Dictamen.
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Proyectos</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Administrar y planificar todos aquellos proyectos que contribuyan jurídicamente a la mejora de la
                        Administración Pública Municipal.
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección Jurídica</h5>
                    <button class="btn btn-primary btn-circle" onclick="toggleContent(this)">+</button>
                <div class="card-text" style="display: none;"><strong>Objetivo:</strong> Atender y dar seguimiento a los asuntos de carácter litigioso que involucren al Gobierno Municipal, para
                        la eficaz y legítima defensa de sus intereses.
                        <strong>Contacto:</strong> (427) 689 0012 Ext. 110</p>
                        </div>
                </div>
            </div>
        </div>
</div>
</div>


<div class="contenedor" >
    <h5>Documentos disponibles para descargar</h5>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>SOLICITUDES Y REGISTROS DE CONSTANCIAS.</th>
                <th>Descarga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>DE CONCUBINATO</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/01 SOLICITUD Y REQUISITOS CONSTANCIA DE CONCUBINATO.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
            <tr>
                <td>DE DENOMINACION DE COMUNIDAD</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/02 SOLICITUD Y REQUISITOS CONSTANCIA DE DENOMINACION DE COMUNIDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
            <tr>
                <td>DE DEPENDENCIA ECONOMICA</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/03 SOLICITUD Y REQUISITOS CONSTANCIA DE DEPENDENCIA ECONOMICA.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
            <tr>
                <td>DE FE DE VIDA</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/04 SOLICITUD Y REQUISITOS CONSTANCIA DE FE DE VIDA.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
            <tr>
                <td>DE IDENTIDAD MAYOR DE EDAD</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/05 SOLICITUD Y REQUISITOS CONSTANCIA DE IDENTIDAD MAYOR DE EDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
            <tr>
                <td>DE IDENTIDAD MENOR DE EDAD</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/06 SOLICITUD Y REQUISITOS CONSTANCIA DE IDENTIDAD MENOR DE EDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE IDENTIDAD U ORIGEN</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/07 SOLICITUD Y REQUISITOS CONSTANCIA DE IDENTIDAD U ORIGEN.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE INGRESOS</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/08 SOLICITUD Y REQUISITOS CONSTANCIA DE INGRESOS.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE RESIDENCIA MAYOR DE EDAD</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/09 SOLICITUD Y REQUISITOS CONSTANCIA DE RESIDENCIA MAYOR DE EDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE RESIDENCIA PARA MENOR DE EDAD</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/10 SOLICITUD Y REQUISITOS CONSTANCIA DE RESIDENCIA PARA MENOR DE EDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE RESIDENCIA PARA REGISTRAR</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/11 SOLICITUD Y REQUISITOS CONSTANCIA DE RESIDENCIA PARA REGISTRAR.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE RESIDENCIA REGISTRO EXTEMPORANEO PARA MAYOR DE EDAD.</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/12 SOLICITUD Y REQUISITOS CONSTANCIA DE RESIDENCIA REGISTRO EXTEMPORANEO PARA MAYOR DE EDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>DE RESIDENCIA REGISTRO EXTEMPORANEO PARA MENOR DE EDAD</td>
                <td><a href="pdf/Sec_Ayuntamiento/FORMATOS DE REQUISITOS/13 SOLICITUD Y REQUISITOS CONSTANCIA DE RESIDENCIA REGISTRO EXTEMPORANEO PARA MENOR DE EDAD.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>REQUISITOS DE ALCOHOLES</td>
                <td><a href="pdf/Sec_Ayuntamiento/REQUISITOS ALCOHOLES.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
  <tr>
                <td>REQUISITOS OTROS GIROS</td>
                <td><a href="pdf/Sec_Ayuntamiento/REQUISITOS OTROS GIROS.pdf" target="_blank" class="btn-download"><i class="bi bi-download"></i> Descargar</a></td>
            </tr>
        </tbody>
    </table>
  </div>

  <style>
/* Estilos generales */
.contenedor {
  max-width: 1200px; /* Limita el ancho máximo del contenedor */
  margin: 0 auto; /* Centra el contenedor horizontalmente */
  padding: 20px; /* Añade un poco de espacio interno */
}

/* Estilo para la tabla */
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

/* Botón de descarga */
.btn-download {
  display: inline-flex; /* Usamos inline-flex para alinear el icono con el texto */
  align-items: center;
  padding: 10px 20px;
  background-color: #0b3b59;
  color: white;
  text-align: center;
  text-decoration: none;
  border-radius: 20px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-download i {
  margin-right: 8px; /* Espacio entre el icono y el texto */
}

.btn-download:hover {
  background-color: #00b2e2;
  transform: scale(1.05); /* Un pequeño efecto de aumento al pasar el cursor */
}

.btn-download:active {
  transform: scale(1); /* Restablecer tamaño cuando se hace clic */
}

/* Estilo para pantallas más pequeñas (dispositivos móviles) */
@media (max-width: 768px) {
  .contenedor {
    padding-left: 10px; /* Menor espacio lateral en móviles */
    padding-right: 10px;
  }

  table, th, td {
    font-size: 14px; /* Ajuste de tamaño de fuente para pantallas pequeñas */
  }
  
  .btn-download {
    padding: 8px 16px; /* Botones más pequeños en móviles */
  }
}
</style>
  
  





<!-- Modales para Google Maps -->
<div class="modal fade" id="modalMap1" tabindex="-1" aria-labelledby="modalMap1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMap1Label">Secretaría del Ayuntamiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3739.91278172683!2d-100.00208702476077!3d20.386485681106965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d30b1bf1d83c0b%3A0x18724ede5e589778!2sPresidencia%20Municipal%20de%20San%20Juan%20del%20R%C3%ADo.!5e0!3m2!1ses-419!2smx!4v1730826131890!5m2!1ses-419!2smx" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="row mt-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Dirección de Cabildo.</h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div style="padding: 80px;">
    <h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">NOTICIAS.</h2>
    <br>
    <?php
    include 'conexion.php';
    
    // Mostrar todas las noticias
    $sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias WHERE id_dependencia=2 ORDER BY fecha_publicacion DESC LIMIT 10";
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

<div class="modal fade" id="modalMap4" tabindex="-1" aria-labelledby="modalMap4Label" aria-hidden ="true">
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

<script src="js/backtotop.js"></script>
<script src="js/botonmas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>