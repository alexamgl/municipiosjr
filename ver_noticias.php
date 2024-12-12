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
$sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='container mt-5'>";
    echo "<div class='row'>"; 
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $titulo = $row['titulo'];
        $cuerpo = str_replace('\\', '', $row['cuerpo']);
        $fecha = date("d/m/Y", strtotime($row['fecha_publicacion']));

        $cuerpo_truncado = substr($cuerpo, 0, 150);

        echo "
            <div class='col-md-4'>
                <div class='card mb-4' data-bs-toggle='modal' data-bs-target='#newsModal' data-title='$titulo' data-content='$cuerpo'>
                    
                <p class='noticia-fecha'>Publicación: $fecha</p>
                <div class='card-body'>
                        <h5 class='card-title'>$titulo</h5>
                        <div class='card-text'>
                            $cuerpo_truncado
                            <span id='dots-$id'>...</span>
                            <span id='more-$id' style='display: none;'>$cuerpo</span>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
    echo "</div>";
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

<!-- Estilos para las imágenes dentro del modal -->
<style>
    #newsModal img {
        max-width: 100%;  /* La imagen no excederá el ancho del modal */
        height: auto;  /* Mantener la proporción de la imagen */
        display: block;
        margin: 0 auto; /* Centrar la imagen */
    }
</style>

<script>
    // Capturar los datos del modal cuando se activa
    var newsModal = document.getElementById('newsModal');
    newsModal.addEventListener('show.bs.modal', function (event) {
        // Obtener los datos del card que activó el modal
        var card = event.relatedTarget; // La tarjeta que activó el modal
        var title = card.getAttribute('data-title'); // Obtener el título del atributo data-*
        var content = card.getAttribute('data-content'); // Obtener el contenido del atributo data-*

        // Actualizar el modal con los datos
        var modalTitle = newsModal.querySelector('.modal-title');
        var modalBody = newsModal.querySelector('#newsModalBody');

        modalTitle.textContent = title;
        modalBody.innerHTML = content; // Usar innerHTML para que se interprete el HTML, incluidas imágenes
    });
</script>
