<?php
if(!$_POST) exit;
// Conexión a la base de datos
	$servername = "localhost";
	$username = "pmsjrcom_joom573"; // Cambiar por tu usuario de MySQL
	$password = "]]S1W45nP7"; // Cambiar por tu contraseña de MySQL
	$dbname = "pmsjrcom_dashboard_municipio";
	// Crear conexión
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Conexión fallida: " . $conn->connect_error);
	}
	
	require("PHPMailer/src/PHPMailer.php");
	// Verificación del Correo (No tocar)
	function isEmail($email) {
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
	}

	if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

	$promocion	 	= $_POST['tipoPromocion'];
	$dep			= $_POST['dependencia'];
	$anonimo		= $_POST['anonimo'];
	$nom    		= $_POST['nombre'];
	$ap    			= $_POST['apellido'];
	$calle    		= $_POST['calle'];
	$numex    		= $_POST['numeroExterior'];
	$numin    		= $_POST['numeroInterior'];
	$col    		= $_POST['colonia'];
	$email    		= $_POST['correo'];
	$tel    		= $_POST['telefono'];
	$sex    		= $_POST['sexo'];
	$nomserv    	= $_POST['nombreServidor'];
	$ap_pat_serv 	= $_POST['apellidoServidorP'];
	$ap_mat_serv    = $_POST['apellidoServidorM'];
	$cargo    		= $_POST['cargo'];
	$motivo    		= $_POST['motivo'];
	$fecha_hechos   = $_POST['fechaHechos'];
	$hora_hechos    = $_POST['horaHechos'];
	$lugar    		= $_POST['lugarHechos'];
	$evidencias    	= $_FILES['evidencias'];
	$descripcion    = $_POST['descripcionHechos'];
	$prefijo 		= substr(md5(uniqid(rand())),0,6);
 
	if((trim($nom) == '') or (trim($ap) == '')) {
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tus Nombres y Apellidos.</div>';
 
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
 
		echo (json_encode($dab));
		exit();
	} else if(trim($email) == '') {
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Correo.</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	} else if($_FILES['evidencias']['size'] == 0) {
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, sube una imagen en Formato JPG, PNG o GIF.</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	} else if(!isEmail($email)) {
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Correo correctamente.</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	} else if(trim($descripcion) == '') {
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa la Descripción de los hechos.</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	}
 
	// Subir Archivo 
	$directorio_destino = "uploads/";
	$archivo_destino = $directorio_destino.$prefijo."_".basename($_FILES["evidencias"]["name"]);
	$uploadOk = 1;
	$formatoImagen = strtolower(pathinfo($archivo_destino,PATHINFO_EXTENSION));
	// Verificamos si la imagen es falsa o no 
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["evidencias"]["tmp_name"]);
		if($check !== false) {
			// echo "Mensaje";
			$uploadOk = 1;
		} else {
			// echo "Mensaje";
			$uploadOk = 0;
		}
	}
	// Verificamos el tamaño de la imagen 
	if (round($_FILES['evidencias']["size"] / 1024) > 8192) {
		$uploadOk = 0;
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>El archivo no debe pesar más de 8 MB.</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	}
	// Permitimos solo ciertos formatos de imagen 
	if($formatoImagen != "jpg" && $formatoImagen != "png" && $formatoImagen != "gif") {
		$uploadOk = 0;
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, sube una imagen en formato JGP, PNG o GIF</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	}
	// Si la imagen no se puede cargar, mostramos un mensaje 
	if ($uploadOk == 0) {
		$a = 0;
		$b = '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Tu imagen no puede ser cargada.</div>';
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
		echo (json_encode($dab));
		exit();
	// Subimos la imagen
	} else {
		$tmp = explode(".", $_FILES["evidencias"]["name"]);
		$nuevonombreimagen = round(microtime(true)) . '.' . end($tmp);
		if (move_uploaded_file($_FILES["evidencias"]["tmp_name"], $directorio_destino . $nuevonombreimagen)){
			$url_archivo = $archivo_destino;
			// Insertar datos en la base de datos
			if(!$anonimo){
				$sql = "INSERT INTO formulario_denuncia (tipo_promocion, dependencia, nombre, apellido, calle, numero_exterior, 
					numero_interior, colonia, email, telefono, sexo, nombre_servidor, apellidop_servidor, apellidom_servidor, cargo_servidor, motivo_denuncia, 
					fecha_hechos, hora_hechos, lugar_hechos, evidencias, descripcion_hechos) 
					VALUES ('$promocion', '$nom', '$ap', '$calle', '$numex', '$numin', '$col', '$email', '$tel', '$sex', '$nom_serv', '$ap_pat_serv', '$ap_mat_serv', '$cargo', '$motivo', '$fecha_hechos', '$hora_hechos', '$lugar', '$url_archivo', '$descripcion')";
			}else{
				$sql = "INSERT INTO formulario_denuncia (tipo_promocion, dependencia, nombre, apellido, calle, numero_exterior, 
					numero_interior, colonia, email, telefono, sexo, nombre_servidor, apellidop_servidor, apellidom_servidor, cargo_servidor, motivo_denuncia, 
					fecha_hechos, hora_hechos, lugar_hechos, evidencias, descripcion_hechos) 
					VALUES ('$promocion', '', '', '', '', '', '', '', '', '$sex', '$nom_serv', '$ap_pat_serv', '$ap_mat_serv', '$cargo', '$motivo', '$fecha_hechos', '$hora_hechos', '$lugar', '$url_archivo', '$descripcion')";
			}
			if ($conn->query($sql) === TRUE) {
				$mail = new PHPMailer();
				$mail->From     = 'websjr@sanjuandelrio.gob.mx'; // Mail de origen
				$mail->FromName = 'Municipio SJR'; // Nombre del que envia
				// Preparar el contenido del correo
				$asunto = "Nueva Denuncia Ciudadana";
				$cuerpo = '
					<html>
					<head>
					<title>Denuncia Ciudadana</title>
					</head>
					<body>
					<h1>Datos del Ciudadano:</h1>
					<p><strong>De:</strong> ' . $nom . ' <strong>Correo:</strong> ' . $email . '</p>
					<p><strong>Teléfono:</strong> ' . $telefono . '</p>
					</br>
					<h1>Datos del Servidor Público:</h1>
					<p><strong>Nombre:</strong> ' . $nom_serv.' '.$ap_pat_serv.' '.$ap_mat_serv . '</p>
					<p><strong>Cargo:</strong> ' . $cargo . '</p>
					<h1>Datos de la Denuncia:</h1>
					<p><strong>Motivo:</strong> ' . $motivo . '</p>
					<p><strong>Fecha de los Hechos:</strong> ' . $fecha_hechos . '</p>
					<p><strong>Hora:</strong> ' . $hora_hechos . '</p>
					<p><strong>Lugar en que ocurrio:</strong> ' . $lugar . '</p>
					<p><strong>Descripcion:</strong> ' . $descripcion . '</p>
					</body>
					</html>';

				// Cabeceras del correo
				$headers = "MIME-Version: 1.0" . PHP_EOL;
				$headers .= "Content-type: text/html; charset=UTF-8" . PHP_EOL;
				$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
				$headers .= "From: Municipio SJR <websjr@sanjuandelrio.gob.mx>" . PHP_EOL;

				// Enviar correo al destinatario
				$destinatario = "mejora.regulatoria@sanjuandelrio.gob.mx";
				
				$mail->AddAddress($destinatario); // Mail destino, podemos agregar muchas direcciones
				$mail->WordWrap = 50; // Largo de las lineas
				$mail->IsHTML(true); // Podemos incluir tags html
				$mail->Subject  =  $asunto;
				$mail->Body     =  $cuerpo.
				$mail->AltBody  =  strip_tags($mail->Body); // Este es el contenido alternativo sin html
				$mail->AddAttachment($url_archivo); // Ingresamos la ruta del archivo
				
				$mail->IsSMTP(); // vamos a conectarnos a un servidor SMTP
				$mail->Host = "mail.sanjuandelrio.gob.mx.com"; // direccion del servidor
				$mail->SMTPAuth = true; // usaremos autenticacion
				$mail->Username = "websjr@sanjuandelrio.gob.mx"; // usuario
				$mail->Password = "pmSJR050516"; // contraseña
				
				/*        ALTERNATIVA SSL
				$mail->Mailer = «smtp»;
				$mail->Host = «ssl://smtp.gmail.com»;
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->Username = «burmauy@gmail.com»; // SMTP username
				$mail->Password = «burmaUY123456»; // SMTP password
				*/
				
				//mail($destinatario, $asunto, $cuerpo, $headers);
				if ($mail->Send()){
					// Si el correo es enviado correctamente, mostramos un mensaje 
					$a = 1;
					$b = "<div class='alert alert-success'>Tu Mensaje ha sido enviado Correctamente !</div>";
					$dab = array(
						"a" => $a, 
						"b" => $b
					);
					echo (json_encode($dab));
				} else {
					$a = 0;
					$b = "<div class='alert alert-danger alert-dismissable'>ERROR al enviar Tu Mensaje !</div>";
					$dab = array(
						"a" => $a, 
						"b" => $b
					);
					echo (json_encode($dab));
				}

				// Enviar correo al remitente (usuario que llena el formulario)
				$cuerpo_remitente = '
					<html>
					<head>
					<title>Denuncia Ciudadana</title>
					</head>
					<body>
					<h1>Datos del Ciudadano:</h1>
					<p><strong>De:</strong> ' . $nom . ' <strong>Correo:</strong> ' . $email . '</p>
					<p><strong>Teléfono:</strong> ' . $telefono . '</p>
					</br>
					<h1>Datos del Servidor Público:</h1>
					<p><strong>Nombre:</strong> ' . $nom_serv.' '.$ap_pat_serv.' '.$ap_mat_serv . '</p>
					<p><strong>Cargo:</strong> ' . $cargo . '</p>
					<h1>Datos de la Denuncia:</h1>
					<p><strong>Motivo:</strong> ' . $motivo . '</p>
					<p><strong>Fecha de los Hechos:</strong> ' . $fecha_hechos . '</p>
					<p><strong>Hora:</strong> ' . $hora_hechos . '</p>
					<p><strong>Lugar en que ocurrio:</strong> ' . $lugar . '</p>
					<p><strong>Descripcion:</strong> ' . $descripcion . '</p>
					<p>Este es un correo de confirmación de tu envío.</p>
					</body>
					</html>';

				// Enviar correo al remitente
				if(mail($correo, "Confirmación de Denuncia Enviada", $cuerpo_remitente, $headers)){
					// Si el correo es enviado correctamente, mostramos un mensaje 
					$a = 1;
					$b = "<div class='alert alert-success'>Tu Mensaje ha sido enviado Correctamente !</div>";
					$dab = array(
						"a" => $a, 
						"b" => $b
					);
					echo (json_encode($dab));
				} else {
					$a = 0;
					$b = "<div class='alert alert-danger alert-dismissable'>ERROR al enviar Tu Mensaje !</div>";
					$dab = array(
						"a" => $a, 
						"b" => $b
					);
					echo (json_encode($dab));
				}
			} else {
				$a = 0;
				$b = "<div class='alert alert-danger alert-dismissable'>" . $sql . "<br>" . $conn->error."</div>";
				$dab = array(
					"a" => $a, 
					"b" => $b
				);
				echo (json_encode($dab));
			}
		}
	}
	// Cerrar la conexión
	$conn->close();
?>