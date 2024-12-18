<div style="padding: 80px;">
<h2 class="mt-5 text-center" style="font-weight: 900; color: #0b3b59;">NOTICIAS.</h2>
<br>
<?php
include 'conexion.php';

// Mostrar todas las noticias
$sql = "SELECT id, titulo, cuerpo, imagen, fecha_publicacion FROM noticias ORDER BY fecha_publicacion DESC LIMIT 10";
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
