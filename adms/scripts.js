// Cargar el navbar y el footer
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

// Inicializar el editor Quill
var quill = new Quill('#editor', {
    theme: 'snow',
    placeholder: 'Escribe aquí el cuerpo de la noticia...',
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link', 'image']
        ]
    }
});

// Función para manejar el envío del formulario
function submitNews() {
    // Obtener el contenido del editor Quill y ponerlo en el campo oculto
    document.getElementById('newsBody').value = quill.root.innerHTML;
    return true; // Permitir el envío del formulario
}

// Mostrar u ocultar el botón "Back to Top"
window.onscroll = function() {
    const backToTopButton = document.getElementById('backToTop');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopButton.style.display = "block";
    } else {
        backToTopButton.style.display = "none";
    }
};

// Función para desplazarse suavemente hacia arriba
document.getElementById('backToTop').onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};


    // Array de ejemplo con noticias (esto se reemplazaría con datos de la base de datos)
    const newsData = [
        {
            title: "Título de la Noticia 1",
            body: "Este es el contenido completo de la noticia 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            image: "https://via.placeholder.com/600x300"
        },
        {
            title: "Título de la Noticia 2",
            body: "Este es el contenido completo de la noticia 2. Praesent suscipit urna a libero bibendum, et fringilla purus volutpat.",
            image: "https://via.placeholder.com/600x300"
        },
        {
            title: "Título de la Noticia 3",
            body: "Este es el contenido completo de la noticia 3. Cras at dolor eu orci congue scelerisque et eu ligula.",
            image: "https://via.placeholder.com/600x300"
        }
    ];

    // Cargar noticias en el contenedor
    const newsContainer = document.getElementById('newsContainer');
    newsData.forEach((news, index) => {
        const card = document.createElement('div');
        card.classList.add('col-md-4', 'mb-4');
        card.innerHTML = `
            <div class="card h-100">
                <img src="${news.image}" class="card-img-top" alt="Imagen de la noticia">
                <div class="card-body">
                    <h5 class="card-title">${news.title}</h5>
                    <p class="card-text">${news.body.substring(0, 100)}...</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsModal" onclick="showNews(${index})">Leer más</button>
                </div>
            </div>
        `;
        newsContainer.appendChild(card);
    });

    // Mostrar noticia en el modal
    function showNews(index) {
        document.getElementById('newsModalLabel').innerText = newsData[index].title;
        document.getElementById('newsModalImage').src = newsData[index].image;
        document.getElementById('newsModalBody').innerText = newsData[index].body;
    }
