<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botoncircular.css">
    <link rel="stylesheet" href="css/backtotop.css">
    <link rel="stylesheet" href="fonts/styles.css">
    <title>Secretaría de Gobierno</title>
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
    <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Secretaría de Gobierno</h1>
    <!-- Nueva tarjeta para el objetivo y funciones de la Secretaría -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">Objetivo</h5>
                    <p class="card-text">Promover e instrumentar los mecanismos institucionales que garanticen la gobernabilidad, el estado de
                        derecho y la paz social en el municipio de San Juan del Río, Querétaro.
                        </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>


<br>
<br>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Secretaría de Gobierno</h5>
                    <p class="card-text"><strong>Dirección:</strong> Av. Paso de los Guzmán, No. 24, Barrio de la Concepción</p>
                    <p class="card-text"><strong>Contacto:</strong> (427) 689 0012 Ext. 301</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMap1">Ver en Google Maps</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="/images/dependencias/GOBIERNO.png" alt="Descripción de la imagen" class="img-card">
        </div>
        <h1 class="text-center" style="font-weight: 900; color: #0b3b59;">Áreas</h1>

        <!-- Seleccionar Modal -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Coordinación</h5>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalCoordinacion">+</button>
                </div>
            </div>
        </div>   
<!-- Modal de Coordinación -->
        <div class="modal fade" id="modalCoordinacion" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCoordinacionLabel">Coordinación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Objetivo:</strong> Promover la correcta ejecución de las actividades de la Secretaría, brindando asesoría e instruyendo a las áreas de la secretaría.</p>
                        <p><strong>Contacto:</strong> (427) 689 0012 Ext. 301</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
<!-- Seleccionar Modal -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Gobierno</h5>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalGobierno">+</button>
                </div>
            </div>
        </div>
                
<!-- Modal de Desarrollo -->
                <div class="modal fade" id="modalGobierno" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCoordinacionLabel">Dirección de Registro Civil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Objetivo:</strong> Prestar servicios de orientación y asesoría a la ciudadanía, relativos a la observancia de disposiciones jurídicas y reglamentarias de aplicación municipal.</p>
                                <p><strong>Contacto:</strong> (427) 689 0012 Ext. 301</p>
                                <div class="card-body">
                                    <!-- Encabezado con la información del lugar, horario y días -->
                                    <h5 class="card-title">
                                        Estos trámites están disponibles en Paso de los Guzmán #24, Barrio de la Concepción, C.P. 76803
                                        en un horario de 08:00 - 16:00 HRS
                                    </h5>
                        
                                    <!-- Tabla de una columna con los trámites -->
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Trámites Disponibles</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td>Fiestas Patronales</td></tr>
                                                <tr><td>Permiso para Eventos con y sin Venta de Alcohol</td></tr>
                                                <tr><td>Permiso para Eventos Peleas de Gallos</td></tr>
                                                <tr><td>Eventos Sociales</td></tr>
                                                <tr><td>Inscripción de Muerte Fetal</td></tr>
                                                <tr><td>Eventos Deportivos</td></tr>
                                                <tr><td>Bailes / Jaripeo / Charlotada</td></tr>
                                                <tr><td>Caravanas</td></tr>
                                                <tr><td>Eventos Varios</td></tr>
                                                <tr><td>Cabalgata / Carrera de Caballos</td></tr>
                                                <tr><td>Quema de Pirotecnia</td></tr>
                                                <tr><td>Trámite de Cartilla de Identidad Militar</td></tr>
                                                <tr><td>Constancia de No Registro</td></tr>
                                                <tr><td>Constancia de Búsqueda de Número de Matrícula)</td></tr>
                                                <tr><td>Constancia de Cartilla en Trámite</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            <div class="card-body">
                                <!-- Encabezado con la información del lugar, horario y días -->
                                <h5 class="card-title">
                                    Estos trámites están disponibles en Benito Juárez Poniente #36, Colonia Centro, C.P. 76800	
                                    en un horario de 08:00 - 16:00 HRS
                                </h5>
                    
                                <!-- Tabla de una columna con los trámites -->
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Trámites Disponibles</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>Permiso para Venta en Vía Pública	</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Seleccionar DP -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Desarrollo Político</h5>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalDPolitico">+</button>
                </div>
            </div>
        </div>

        <!-- Modal de Coordinación -->
        <div class="modal fade" id="modalDPolitico" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCoordinacionLabel">Direccion de Desarrollo Político</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong>Objetivo:</strong> Promover y coordinar las acciones de comunicación y concertación del Gobierno Municipal con las
        organizaciones sociopolíticas del municipio, en un marco de pluralidad, respeto, transparencia y
        corresponsabilidad. <br><strong>Contacto:</strong> (427) 689 0012 Ext. 301</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


           <!-- Seleccionar JC -->
           <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Juzgados Cívicos</h5>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalJC">+</button>
                </div>
            </div>
        </div>
        
<!-- Modal de Coordinación -->
        <div class="modal fade" id="modalJC" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCoordinacionLabel">Dirección de Juzgados Cívicos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                <p><strong>Objetivo:</strong> Planear, dirigir y coordinar las políticas y acciones del Juzgado, así como representar a la persona titular de la Presidencia Municipal en actos de cualquier autoridad administrativa y de la ciudadanía cuando lo soliciten.</p>
                
                                <!-- Tabla con los trámites y servicios -->
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Trámite y/o Servicio</th>
                                                <th>Lugar</th>
                                                <th>Horario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Quejas de Carácter Administrativo</td>
                                                <td>
                                                    Benito Juárez Poniente #36, Colonia Centro, C.P. 76800<br>
                                                    C. Hermenegildo Galeana No. 39 A, Colonia Centro, San Juan del Río, Qro.
                                                </td>
                                                <td>08:00 - 16:00 HRS</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

           <!-- Seleccionar RC -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Registro Civil</h5>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalRC">+</button>
                </div>
            </div>
        </div>  
<!-- Modal de Coordinación -->
        <div class="modal fade" id="modalRC" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCoordinacionLabel">Dirección de Registro Civil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Objetivo:</strong> Organizar y controlar la inscripción de todos los actos referentes al estado civil de las personas que habitan en el municipio, así como la compilación y emisión de actas a su cargo.</p>
                        <div class="card-body">
                            <!-- Encabezado con la información del lugar, horario y días -->
                            <h5 class="card-title">
                                Estos trámites están disponibles en Paso de los Guzman #24, Barrio de la Concepción, C.P. 76817 
                                en un horario de 08:00 - 16:00 HRS
                            </h5>
                
                            <!-- Tabla de una columna con los trámites -->
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Trámites Disponibles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Inscripción de Acta de Nacimiento	</td></tr>
                                        <tr><td>Inscripción de Acta de Matrimonio</td></tr>
                                        <tr><td>Inscripción de Acta de Reconocimiento</td></tr>
                                        <tr><td>Inscripción de Acta de Defunción</td></tr>
                                        <tr><td>Inscripción de Muerte Fetal</td></tr>
                                        <tr><td>Inscripción de Acta de Divorcio (Judicial)</td></tr>
                                        <tr><td>Inscripción de Acta de Divorcio (Administrativo)</td></tr>
                                        <tr><td>Inscripción de Acta de Extranjeros</td></tr>
                                        <tr><td>Copia Certificada de Acta</td></tr>
                                        <tr><td>Aclaración de Acta Administrativa</td></tr>
                                        <tr><td>Constancia de Inexistencia de Nacimiento</td></tr>
                                        <tr><td>Constancia de Inexistencia de Matrimonio</td></tr>
                                        <tr><td>Inscripción de Ejecutorias</td></tr>
                                        <tr><td>Sistema Nacional de Registro de Identidad (CURP)</td></tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

           <!-- Seleccionar DP -->
           <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Protección Civil</h5>
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
                        <h5 class="modal-title" id="modalCoordinacionLabel">Direccion de Protección Civil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <strong>Objetivo:</strong> Es un órgano dentro del Sistema Municipal de Protección Civil y le compete ejecutar las acciones de
                                prevención, auxilio y recuperación o restablecimiento conforme a este Reglamento, y a los programas
                                y acuerdos que autorice el Consejo de Protección Civil Municipal.  
                                <div class="col-md-12">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <!-- Encabezado con la información del lugar, horario y días -->
                                            <h5 class="card-title">
                                                Estos trámites están disponibles en Benito Juarez Poniente #20, Colonia Centro, C.P. 76800 
                                                en un horario de 08:00 - 16:00 HRS. los días LUNES A VIERNES EXCEPTO DÍAS FERIADOS
                                            </h5>
                                
                                            <!-- Tabla de una columna con los trámites -->
                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered table-striped">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Trámites Disponibles</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr><td>1. Visto Bueno Protección Civil Bajo Riesgo 0-100M2</td></tr>
                                                        <tr><td>2. Visto Bueno Protección Civil Bajo Riesgo 101-500M2</td></tr>
                                                        <tr><td>3. Visto Bueno Protección Civil Bajo Riesgo Mayor de 501M2</td></tr>
                                                        <tr><td>4. Visto Bueno Protección Civil Medio Riesgo 0-100M2</td></tr>
                                                        <tr><td>5. Visto Bueno Protección Civil Medio Riesgo 101-500M2</td></tr>
                                                        <tr><td>6. Visto Bueno Protección Civil Medio Riesgo Mayor 501M2</td></tr>
                                                        <tr><td>7. Visto Bueno Protección Civil Alto Riesgo 0-100M2</td></tr>
                                                        <tr><td>8. Visto Bueno Protección Civil Alto Riesgo 101-500M2</td></tr>
                                                        <tr><td>9. Visto Bueno Protección Civil Alto Riesgo Mayor de 501M2</td></tr>
                                                        <tr><td>10. Visto Bueno Protección Civil Industria, Gasolinera, Estación de Carburación y Gasera</td></tr>
                                                        <tr><td>11. Visto Bueno Protección Civil Actividades No Lucrativas</td></tr>
                                                        <tr><td>12. Visto Bueno Protección Civil Actividades Lucrativas</td></tr>
                                                        <tr><td>13. Visto Bueno Protección Civil IAP</td></tr>
                                                        <tr><td>14. Factibilidad de Evento 100 a 300 Personas</td></tr>
                                                        <tr><td>15. Factibilidad de Evento 301 a 500 Personas</td></tr>
                                                        <tr><td>16. Factibilidad de Evento 501 a 1000 Personas</td></tr>
                                                        <tr><td>17. Factibilidad de Evento 1001 Personas en Adelante</td></tr>
                                                        <tr><td>18. Factibilidad de Evento Circos</td></tr>
                                                        <tr><td>19. Factibilidad de Evento Juegos Mecánicos</td></tr>
                                                        <tr><td>20. Factibilidad de Evento Quema de Pirotecnia</td></tr>
                                                        <tr><td>21. Factibilidad de Evento Instalación de Carpas</td></tr>
                                                        <tr><td>22. Opinión Técnica Comercio Ambulante</td></tr>
                                                        <tr><td>23. Opinión Técnica de 1 Hasta 250 M2 de Construcción</td></tr>
                                                        <tr><td>24. Opinión Técnica de 251 Hasta 1000 M2 de Construcción</td></tr>
                                                        <tr><td>25. Opinión Técnica de 1001 M2 de Construcción en Adelante</td></tr>
                                                        <tr><td>26. Opinión Técnica Fraccionamiento y/o Empresa</td></tr>
                                                        <tr><td>27. Opinión Técnica Seguros de Viviendas, Comercio e Industrias</td></tr>
                                                        <tr><td>28. Opinión Técnica Espectaculares</td></tr>
                                                        <tr><td>29. Análisis de Riesgos Fraccionamiento</td></tr>
                                                        <tr><td>30. Análisis de Riesgos Industrial</td></tr>
                                                        <tr><td>31. Análisis de Riesgos Gasolinera</td></tr>
                                                        <tr><td>32. Análisis de Riesgos Gasera</td></tr>
                                                        <tr><td>33. Análisis de Riesgos Estación de Carburación</td></tr>
                                                        <tr><td>34. Análisis de Riesgos Plaza Comercial</td></tr>
                                                        <tr><td>35. Análisis de Riesgos Escolar</td></tr>
                                                        <tr><td>36. Análisis de Riesgos Guarderías y Estancias Infantiles</td></tr>
                                                        <tr><td>37. Análisis de Riesgos Comercios</td></tr>
                                                        <tr><td>38. Análisis de Riesgos Habitacional</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <!-- Encabezado con la información del lugar, horario y días -->
                                                        <h5 class="card-title">
                                                            Estos servicios están disponibles en Ing. Leopoldo Peralta Navarrete s/n, Colonia Ramos Millán, 
                                                            C.P. 76807 en un horario de LAS 24 HRS. todo el año
                                                        </h5>
                                            
                                                        <!-- Tabla de una columna con los servicios -->
                                                        <div class="table-responsive mt-3">
                                                            <table class="table table-bordered table-striped">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Servicios Disponibles</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr><td>43. Coordinación para Atención Prehospitalaria</td></tr>
                                                                    <tr><td>44. Coordinación para Fugas de Gas</td></tr>
                                                                    <tr><td>45. Coordinación para Incendios Urbanos</td></tr>
                                                                    <tr><td>46. Coordinación para Incendios de Cobertura Vegetal</td></tr>
                                                                    <tr><td>48. Coordinación para Inundaciones</td></tr>
                                                                    <tr><td>49. Coordinación para Accidentes Vehiculares</td></tr>
                                                                    <tr><td>50. Coordinación para Olor a Químicos</td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                    </div>
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

        <!-- Seleccionar DP -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dirección de Capacitación Civil y Enlace Bomberos</h5>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modalCCB">+</button>
                </div>
            </div>
        </div>
        
<!-- Modal de Coordinación -->
        <div class="modal fade" id="modalCCB" tabindex="-1" aria-labelledby="modalCoordinacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCoordinacionLabel">Dirección de Capacitación Civil y <br>Enlace Bomberos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong>Objetivo:</strong> Fomentar la cultura de protección civil y de la autoprotección a la población del municipio a través de
                            la promoción, coordinación e impartición de cursos básicos, así como la programación de capacitación
                            y eventos que promuevan en la población trabajar en las acciones preventivas.
    <div class="col-md-12">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Trámites y/o Servicios</h5>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Trámite o Servicio</th>
                                <th>Lugar</th>
                                <th>Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-PROGRAMA DE PREVENCIÓN APRENDE A CUIDARTE DIRIGIDO A ALUMNOS DE EDUCACIÓN BÁSICA, DIRIGIDO A ALUMNOS, MAESTROS Y PERSONAL ADMINISTRATIVO.</td>
                                <td>SE ACUDE A LA INSTITUCIÓN EDUCATIVA</td>
                                <td>LUNES A VIERNES DENTRO DEL HORARIO ESCOLAR.</td>
                            </tr>
                            <tr>
                                <td>-PROGRAMA CUIDANDO LA ECONOMÍA FAMILIAR POR MEDIO DE LA CAPACITACIÓN GRATUITA DE PRIMEROS AUXILIOS, COMBATE DE INCENDIOS Y EVACUACIÓN A ESTABLECIMIENTOS DE RIESGO BAJO Y RIESGO MEDIO, EN COORDINACIÓN ENTRE CRUZ ROJA MEXICANA Y BOMBEROS PARA SUS TRÁMITES PARA LICENCIA MUNICIPAL DE FUNCIONAMIENTO.</td>
                                <td>ESTACIÓN 3 DE BOMBEROS</td>
                                <td>SE DEFINEN DÍAS Y HORARIOS SEGÚN LA PROGRAMACIÓN.</td>
                            </tr>
                            <tr>
                                <td>-PROGRAMA DE CAPACITACIÓN GRATUITA EN COMUNIDADES Y COLONIAS CON RESPECTO A PREVENCIÓN DE ACCIDENTES.</td>
                                <td>SE ACUDE A LA COMUNIDAD O COLONIA</td>
                                <td>SE DEFINEN DÍAS Y HORAS EN COORDINACIÓN CON DELEGADOS Y PRESIDENTES DE COLONOS.</td>
                            </tr>
                            <tr>
                                <td>-FERIAS DE PREVENCIÓN EN COORDINACIÓN ENTRE CRUZ ROJA MEXICANA Y BOMBEROS CON EL OBJETIVO DE QUE LA POBLACIÓN APRENDA DE LOS SERVICIOS QUE OFRECEN LAS INSTITUCIONES DE EMERGENCIA.</td>
                                <td>EN DISTINTOS PUNTOS</td>
                                <td>POR DEFINIR SEGÚN LA SOLICITUD DE LA POBLACIÓN.</td>
                            </tr>
                            <tr>
                                <td>-ATENCIÓN MÉDICA PREHOSPITALARIA EN MOTOS CON TÉCNICOS EN URGENCIAS MÉDICAS PARA BRINDAR UNA PRIMERA RESPUESTA EN EMERGENCIAS.</td>
                                <td>EN TODO EL MUNICIPIO</td>
                                <td>08:00 HORAS A 17:00 HORAS LOS 365 DÍAS DEL AÑO.</td>
                            </tr>
                            <tr>
                                <td>-ATENCIÓN MÉDICA PREHOSPITALARIA (AMBULANCIA DE ATENCIÓN BÁSICA) PARA RESPUESTA A EMERGENCIAS. <br>
                                    -ATENCIÓN MÉDICA PREHOSPITALARIA (AMBULANCIA DE ATENCIÓN AVANZADA) PARA RESPUESTA A EMERGENCIAS. <br>
                                    -ATENCIÓN PARA EL CONTROL Y SOFOCACIÓN DE INCENDIOS. <br>
                                    -ATENCIÓN PARA BÚSQUEDA Y RESCATE EN ESTRUCTURAS. <br>
                                    -INTERVENCIÓN POR FUGAS DE GAS Y OLOR A QUÍMICOS.
                                    -INTERVENCIÓN EN EMERGENCIAS CON MATERIALES PELIGROSOS.
                                    -ATENCIÓN PARA BÚSQUEDA Y RESCATE CON BINOMIOS CANINOS.
                                    -ATENCIÓN PARA BÚSQUEDA Y LOCALIZACIÓN CON DRONES.
                                    -ATENCIÓN PARA RESCATE VEHICULAR.
                                    -ATENCIÓN PARA RESCATE CON CUERDAS (ALTURAS Y ESPACIOS CONFINADOS).
                                    -CONTROL DE ABEJAS.
                                    -CONTROL DE FAUNA.
                                    -INSTALACIÓN DE COMANDO DE INCIDENTES.
                                    -BÚSQUEDA SUPERFICIAL EN CUERPOS DE AGUA.
                                    -INTERVENCIÓN EN RESCATE AGRESTE.</td>
                                <td>A TODA LA POBLACIÓN</td>
                                <td>24 HORAS DEL DÍA LOS 365 DÍAS DEL AÑO.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
</div>
<div style="padding: 80px;">
    <h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">NOTICIAS.</h2>
    <br>
    <?php
    include 'conexion.php';
    
    // Mostrar todas las noticias
    $sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias WHERE id_dependencia=3 ORDER BY fecha_publicacion DESC LIMIT 10";
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

<!-- Modales para Google Maps -->
<div class="modal fade" id="modalMap1" tabindex="-1" aria-labelledby="modalMap1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMap1Label">Secretaría de Gobierno</h5>
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

<script src="js/backtotop.js"></script>
<script src="js/botonmas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>