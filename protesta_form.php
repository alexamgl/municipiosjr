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

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
			if (copy($_FILES['evidencias']['tmp_name'],$destino)) {
				$status = "Archivo subido: <b>".$archivo."</b>";   
				/*echo "el archivo llamado ".$archivo."de tamano".$tamano."de tipo ".$tipo." fue subido con exito";*/
				$url_archivo = $destino_final;
			} else {
				$status = "Error al subir el archivo";
			}
		} else {
			$status = "Error al subir archivo";
		}
	}
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

    // Insertar datos en la base de datos
    $sql = "INSERT INTO protesta_ciudadana (nombres, apellidos, domicilio, telefono, correo, nombre_tramite, 
            folio_tramite, nombre_servidorpublico, dependencia_tramite, negacion, dependencia_hechos, 
            descripcion_hechos, fecha, evidencias) VALUES ('$nombres', '$apellidos', '$domicilio', '$telefono', '$correo', '$nombre_tramite', '$folio_tramite', '$nombre_servidorpublico', '$dependencia_tramite', '$negacion', '$dependencia_hechos', '$descripcion_hechos', '$fecha', '$evidencias')";

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
			<p><strong>Nombre:</strong> ' . $nombres . '</p>
			<p><strong>Correo:</strong> ' . $correo . '</p>
			<p><strong>Teléfono:</strong> ' . $telefono . '</p>
			<p><strong>Descipición de los hechos:</strong> ' . $descripcion_hechos . '</p>
			<p>Este es un correo de confirmación de tu envío.</p>
			</body>
			</html>';

		// Enviar correo al remitente
		mail($correo, "Confirmación de Comentario Enviado", $cuerpo_remitente, $headers);
		header('Location: protestaciudadana.html'); // Cambia 'success.html' por la ruta de tu archivo HTML
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
