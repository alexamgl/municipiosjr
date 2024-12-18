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

// Mostrar todas las noticias
$sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias ORDER BY fecha_publicacion DESC LIMIT 10";
$result = $conn->query($sql);

// Verificar si hay noticias disponibles
if ($result->num_rows > 0) {
    echo "<div class='container mt-5'>";
    echo "<div class='row'>"; // Inicia el grid de Bootstrap para las cards
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $titulo = $row['titulo'];
        $cuerpo = $row['cuerpo']; // Obtener todo el contenido del cuerpo
        $fecha = date("d/m/Y", strtotime($row['fecha_publicacion']));
        
        $cuerpo=str_replace('\\','',$cuerpo);
        // Truncar el cuerpo a 150 caracteres para mostrar solo un fragmento
        $cuerpo_truncado = substr($cuerpo, 0, 150); 

        echo "
            <div class='col-md-4'> <!-- Cada noticia ocupará un tercio del ancho -->
                <div class='card mb-4'>
                    <div class='card-body'>
                        <h5 class='card-title'>$titulo</h5>
                        <p class='card-subtitle mb-2 text-muted'>Fecha: $fecha</p>
                        <div class='card-text'>
                            $cuerpo_truncado
                            <span id='dots-$id'>...</span>
                            <span id='more-$id' style='display: none;'>$cuerpo</span> <!-- Texto completo oculto -->
                        </div>
                        <!-- Botones de acción -->
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#newsModal' 
                                data-title='$titulo' data-content='$cuerpo'>
                            Leer más
                        </button>
                        </div>
                </div>
            </div>
        ";
    }
    echo "</div>"; // Cierra el grid de Bootstrap
    echo "</div>"; // Cierra el contenedor principal
} else {
    echo "<p>No hay noticias disponibles.</p>";
}

$conn->close();
?>

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
        <button type="button" class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>


<script>
    // Capturar los datos del modal cuando se activa
    var newsModal = document.getElementById('newsModal');
    newsModal.addEventListener('show.bs.modal', function (event) {
        // Obtener los datos del botón que activó el modal
        var button = event.relatedTarget; // El botón que activó el modal
        var title = button.getAttribute('data-title'); // Obtener el título de los data-* atributos
        var content = button.getAttribute('data-content'); // Obtener el contenido de los data-* atributos
        
        // Actualizar el modal con los datos
        var modalTitle = newsModal.querySelector('.modal-title');
        var modalBody = newsModal.querySelector('#newsModalBody');
        
        modalTitle.textContent = title; // Establecer el título del modal
        modalBody.innerHTML = content; // Usar innerHTML para que se interprete el HTML

        // Tiempo de inactividad en milisegundos (5 minutos = 300000 ms)
var inactiveTime = 300000;
var timer;

function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(logoutUser, inactiveTime);
}

function logoutUser() {
    // Redirigir al logout o cerrar sesión automáticamente
    window.location.href = "logout.php"; // Asegúrate de tener un script que cierre la sesión
}

// Resetear el temporizador en eventos de actividad
window.onload = resetTimer;
document.onmousemove = resetTimer;
document.onkeypress = resetTimer;

    });

</script>
