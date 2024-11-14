<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "develop"; // Cambiar por tu usuario de MySQL
$password = "develop1"; // Cambiar por tu contraseña de MySQL
$dbname = "dashboard_municipio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO agenda_regulatoria (nombre, correo, telefono, comentario) VALUES ('$nombre', '$email', '$telefono', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Comentario enviado con éxito";

		// Preparar el contenido del correo
		$asunto = "Comentarios de la Agenda Regulatoria";
		$cuerpo = '
			<html>
			<head>
			<title>Comentarios de la Agenda Regulatoria</title>
			</head>
			<body>
			<h1>Detalles del Comentario</h1>
			<p><strong>De:</strong> ' . $nombre . ' <strong>Correo:</strong> ' . $email . '</p>
			<p><strong>Teléfono:</strong> ' . $telefono . '</p>
			<p><strong>Comentarios:</strong> ' . $descripcion . '</p>
			</body>
			</html>';

		// Cabeceras del correo
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		$headers .= "From: $nombre <$email>\r\n";

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
			<p><strong>Nombre:</strong> ' . $nombre . '</p>
			<p><strong>Correo:</strong> ' . $email . '</p>
			<p><strong>Teléfono:</strong> ' . $telefono . '</p>
			<p><strong>Comentarios:</strong> ' . $descripcion . '</p>
			<p>Este es un correo de confirmación de tu envío.</p>
			</body>
			</html>';

		// Enviar correo al remitente
		mail($email, "Confirmación de Comentario Enviado", $cuerpo_remitente, $headers);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>