<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

	$status = "";
	$url_archivo="";
	if ($_POST["action"] == "upload") {
		// obtenemos los datos del archivo
		$tamano = $_FILES["evidencias"]['size'];
		$tipo = $_FILES["evidencias"]['type'];
		$archivo = $_FILES["evidencias"]['name'];
		$prefijo = substr(md5(uniqid(rand())),0,6);

		if ($archivo != "") {
			// guardamos el archivo a la carpeta files
			$destino =  "uploads/".$prefijo."_".$archivo;
			$destino_final="uploads/".$prefijo."_".$archivo;
			if (move_uploaded_file($_FILES['evidencias']['tmp_name'],$destino)) {
				$status = "Archivo subido: <b>".$archivo."</b>";   
				//echo "el archivo llamado ".$archivo."de tamano".$tamano."de tipo ".$tipo." fue subido con exito";*/
				$url_archivo = $destino_final;
				
				$nombres = $conn->real_escape_string($_POST['nombres']);
				$apellidos = $conn->real_escape_string($_POST['apellidos']);
				$domicilio = $conn->real_escape_string($_POST['domicilio']);
				$telefono = $conn->real_escape_string($_POST['telefono']);
				$correo = $conn->real_escape_string($_POST['correo']);
				$nombre_tramite = $conn->real_escape_string($_POST['nombre_tramite']);
				$folio_tramite = $conn->real_escape_string($_POST['folio_tramite']);
				$nombre_servidorpublico = $conn->real_escape_string($_POST['nombre_servidorpublico']);
				$dependencia_tramite = $conn->real_escape_string($_POST['dependencia_tramite']);
				$negacion = $conn->real_escape_string($_POST['negacion']);
				$dependencia_hechos = $conn->real_escape_string($_POST['dependencia_hechos']);
				$fecha = $conn->real_escape_string($_POST['fecha']);
				$descripcion_hechos = $conn->real_escape_string($_POST['descripcion_hechos']);
				$evidencias = $conn->real_escape_string($url_archivo);
				// Recoger las respuestas de los checkboxes
				$opciones = isset($_POST['opciones']) ? implode(", ", $_POST['opciones']) : '';
				
				// Insertar datos en la base de datos
				$sql = "INSERT INTO protesta_ciudadana (nombres, apellidos, domicilio, telefono, correo, nombre_tramite, 
						folio_tramite, nombre_servidorpublico, dependencia_tramite, negacion, dependencia_hechos, 
						descripcion_hechos, fecha, evidencias, opciones) VALUES ('$nombres', '$apellidos', '$domicilio', '$telefono', '$correo', '$nombre_tramite', '$folio_tramite', '$nombre_servidorpublico', '$dependencia_tramite', '$negacion', '$dependencia_hechos', '$descripcion_hechos', '$fecha', '$evidencias', '$opciones')";

				if ($conn->query($sql) === TRUE) {
					// Preparar el contenido del correo
					$asunto = "Protesta Ciudadana";
					$cuerpo = '
						<html>
						<head>
						<title>Protesta ciudadana</title>
						</head>
						<body>
						<h1>Detalles</h1>
						<p><strong>De:</strong> ' . $nombres . ' <strong>Correo:</strong> ' . $correo . '</p>
						<p><strong>Teléfono:</strong> ' . $telefono . '</p>
						<p><strong>Nombre del trámite:</strong> ' . $nombre_tramite . '</p>
						<p><strong>Folio del trámite o servicio:</strong> ' . $folio_tramite . '</p>
						<p><strong>Nombre del servidor público que atendió:</strong> ' . $nombre_servidorpublico . '</p>
						<p><strong>Dependencia donde se realizó el trámite o servicio:</strong> ' . $dependencia_tramite . '</p>
						<p><strong>¿Se negó la gestión del trámite sin causa justificada? :</strong> ' . $negacion . '</p>
						<p><strong>Descripcion de los hechos:</strong> ' . $descripcion_hechos . '</p>
						<p><strong>Opciones seleccionadas:</strong> ' . $opciones . '</p>
						</body>
						</html>';

					// Cabeceras del correo
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=UTF-8\r\n";
					$headers .= "From: Municipio SJR <websjr@sanjuandelrio.gob.mx>\r\n";

					// Enviar correo al destinatario
					$destinatario = "mejora.regulatoria@sanjuandelrio.gob.mx";
					mail($destinatario, $asunto, $cuerpo, $headers);

					// Enviar correo al remitente (usuario que llena el formulario)
					$cuerpo_remitente = '
						<html>
						<head>
						<title>Confirmación de Envío de Comentario</title>
						</head>
						<body>
						<h1>Gracias por tu comentario</h1>
						<p>Gracias por ayudarnos a mejorar la Agenda Regulatoria. A continuación, los detalles de tu comentario:</p>
						<p><strong>Nombre(s):</strong> ' . $nombres . '</p>
                        <p><strong>Apellidos:</strong> ' . $apellidos . '</p>
						<p><strong>Correo:</strong> ' . $correo . '</p>
						<p><strong>Teléfono:</strong> ' . $telefono . '</p>
						<p><strong>Descipición de los hechos:</strong> ' . $descripcion_hechos . '</p>
						<p><strong>Opciones seleccionadas:</strong> ' . $opciones . '</p>
						<p>Este es un correo de confirmación de tu envío.</p>
						</body>
						</html>';

					// Enviar correo al remitente
					mail($correo, "Confirmación de Comentario Enviado", $cuerpo_remitente, $headers);
					echo $status;
					//header('Location: protestaciudadana.html'); // Cambia 'success.html' por la ruta de tu archivo HTML
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} else {
				$status = "Error al subir el archivo";
			}
		} else {
			$status = "Error al subir archivo";
		}
	}
	// Cerrar la conexión
	$conn->close();
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botoncircular.css">
    <link rel="stylesheet" href="css/backtotop.css">
    <title>Protesta Ciudadana</title>
</head>
<body>
    <!-- Aquí se cargará el navbar -->
    <div id="navbarContainer"></div>

    <!-- Formulario de Denuncia -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header text-white text-center" style="background-color: #0b3b59;">
                        <h4>Protesta Ciudadana</h4>
                    </div>                    
                    <div class="card-body">
                        <form action="protestaciudadana.php" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombres" class="form-label">Nombre(s)*</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" required placeholder="Ingresa tu nombre">
                                </div>
                                <div class="col-md-6">
                                    <label for="apellidos" class="form-label">Apellidos*</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Ingresa tus apellidos">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="domicilio" class="form-label">Domicilio*</label>
                                    <input type="text" class="form-control" id="domicilio" name="domicilio" required placeholder="Ingresa tu domicilio">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefono" class="form-label">Telefono*</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" required placeholder="Ingresa tu número de teléfono">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="correo" class="form-label">Correo Electrónico*</label>
                                    <input type="email" class="form-control" id="correo" name="correo" required placeholder="Ingresa tu correo electrónico">
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre_tramite" class="form-label">Nombre del trámite o servicio que realiza*</label>
                                    <input type="text" class="form-control" id="nombre_tramite" name="nombre_tramite" required placeholder="Ingresa el nombre del trámite">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="folio_tramite" class="form-label">Número de folio del trámite o servicio*</label>
                                    <input type="text" class="form-control" id="folio_tramite" name="folio_tramite" required placeholder="Ingresa el número de folio">
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre_servidorpublico" class="form-label">Nombre del servidor público que atendió*</label>
                                    <input type="text" class="form-control" id="nombre_servidorpublico" name="nombre_servidorpublico" required placeholder="Ingresa el nombre del servidor público">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dependencia_tramite" class="form-label">Dependencia donde se realizó el trámite o servicio*</label>
                                    <input type="text" class="form-control" id="dependencia_tramite" name="dependencia_tramite" required placeholder="Ingresa la dependencia">
                                </div>
                                <div class="col-md-6">
                                    <label for="negacion" class="form-label">¿Se negó la gestión del trámite sin causa justificada?*</label>
                                    <select class="form-select" id="negacion" name="negacion" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="si">Si</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dependencia_hechos" class="form-label">Dependencia o lugar donde ocurrieron los hechos*</label>
                                    <input type="text" class="form-control" id="dependencia_hechos" name="dependencia_hechos" required placeholder="Ingresa la dependencia o lugar">
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha" class="form-label">Fecha en que ocurrieron los hechos*</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion_hechos" class="form-label">Describa los hechos de manera clara y concisa*</label>
                                <textarea class="form-control" id="descripcion_hechos" name="descripcion_hechos" rows="4" required placeholder="Escribe una descripción clara de los hechos"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="evidencias" class="form-label">Evidencia de los hechos*</label>
                                <input type="file" class="form-control" id="evidencias" name="evidencias" required>
								<input name="action" type="hidden" value="upload" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">¿Se incumplió lo manifestado en el Registro Municipal de Trámites y Servicios en alguno de los siguientes puntos? (puede seleccionar más de uno)*</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion1" name="opciones[]" value="No se respetaron los requisitos especificados para el trámite o servicio.">
                                        <label class="form-check-label" for="opcion1">No se respetaron los requisitos especificados para el trámite o servicio.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion2" name="opciones[]" value="No se respetó la forma especificada para presentar el trámite o servicio.">
                                        <label class="form-check-label" for="opcion2">No se respetó la forma especificada para presentar el trámite o servicio.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion3" name="opciones[]" value="Me requirieron una inspección que no estaba especificada.">
                                        <label class="form-check-label" for="opcion3">Me requirieron una inspección que no estaba especificada.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion4" name="opciones[]" value="Los datos de contacto especificados son incorrectos.">
                                        <label class="form-check-label" for="opcion4">Los datos de contacto especificados son incorrectos.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion5" name="opciones[]" value="No se cumplieron los tiempos especificados para resolver el trámite o servicio.">
                                        <label class="form-check-label" for="opcion5">No se cumplieron los tiempos especificados para resolver el trámite o servicio.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion6" name="opciones[]" value="No se respetaron los costos del pago del trámite o servicio o las alternativas de pago especificadas.">
                                        <label class="form-check-label" for="opcion6">No se respetaron los costos del pago del trámite o servicio o las alternativas de pago especificadas.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion7" name="opciones[]" value="No se respetó la vigencia especificada del documento emitido con el trámite o servicio.">
                                        <label class="form-check-label" for="opcion7">No se respetó la vigencia especificada del documento emitido con el trámite o servicio.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion8" name="opciones[]" value="No se respetaron los criterios de resolución del trámite o servicio.">
                                        <label class="form-check-label" for="opcion8">No se respetaron los criterios de resolución del trámite o servicio.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion9" name="opciones[]" value="No se recibió el trámite en alguna de las unidades administrativas especificadas.">
                                        <label class="form-check-label" for="opcion9">No se recibió el trámite en alguna de las unidades administrativas especificadas.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion10" name=" opciones[]" value="No se respetaron los horarios para la atención del trámite o servicio.">
                                        <label class="form-check-label" for="opcion10">No se respetaron los horarios para la atención del trámite o servicio.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion11" name="opciones[]" value=">Los números de teléfono o medios electrónicos para el envío de consultas, documentos o quejas son incorrectos">
                                        <label class="form-check-label" for="opcion11">Los números de teléfono o medios electrónicos para el envío de consultas, documentos o quejas son incorrectos.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opcion12" name="opciones[]" value="No se respetó la información especificada que se debía conservar para fines de acreditación, inspección o verificación.">
                                        <label class="form-check-label" for="opcion12">No se respetó la información especificada que se debía conservar para fines de acreditación, inspección o verificación.</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="background-color: #0b3b59;">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="footerContainer"></div>

    <!-- Botón "Back to Top" -->
    <button id="backToTop" class="btn" title="Volver arriba">
        <i class="bi bi-arrow-up"></i>
    </button>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Envío exitoso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tu formulario ha sido enviado con éxito.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('protestaciudadana').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que se recargue la página

        const formData = new FormData(this); // Obtener los datos del formulario
        formData.append('action', 'upload'); // Asegúrate de agregar la acción

        fetch('protestaciudadana.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Para depuración, puedes ver la respuesta en la consola

            if (data.trim() === "success") {
                // Vaciar los campos del formulario
                this.reset();

                // Mostrar el modal de éxito
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            } else {
                alert("Ocurrió un error: " + data); // Mostrar error si no fue exitoso
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>