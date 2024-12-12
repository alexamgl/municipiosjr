
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Noticia</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Noticia</h2>
        <form id="editNewsForm">
            <div class="form-group mb-3">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo"  class="form-control" placeholder="Escribe el título aquí" required>
            </div>
            <div class="form-group mb-3">
                <label for="editor">Contenido:</label>
                <div id="editor" style="height: 300px; margin-bottom: 20px;"></div>
                <input type="text" name="cuerpo" id="cuerpo">

            </div>
            <div class="text-center">
                <button type="button" class="btn btn-success" onclick="guardarCambios()">Guardar Cambios</button>
                <a href="administrar.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Inicializar Quill
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link', 'image']
                ]
            }
        });
        // Obtener el parámetro ID de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const noticiaId = urlParams.get('id');

        if (noticiaId) {
            // Cargar los datos de la noticia
            fetch(`obtener_noticia.php?id=${noticiaId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('titulo').value = data.noticia.titulo;
                        const nvocuerpo=data.noticia.cuerpo.replace('\\','');
                        quill.root.innerHTML = nvocuerpo.replace('\\','');
                    } else {
                        alert('Error al cargar la noticia: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error al cargar la noticia:', error);
                    alert('Hubo un problema al cargar los datos.');
                });
        } else {
            alert('No se proporcionó un ID de noticia válido.');
        }

        // Guardar los cambios
        function guardarCambios() {
            const titulo = document.getElementById('titulo').value;
            const cuerpo = quill.root.innerHTML;
            fetch('guardar_edicion.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id: noticiaId, titulo: titulo, cuerpo: cuerpo }),
})
    .then(async response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Noticia actualizada con éxito.');
            window.location.href = 'administrar.php';
        } else {
            console.error('Error del servidor:', data.error);
            alert('Error al guardar los cambios: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('No se pudo guardar la noticia.');
    });              
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
