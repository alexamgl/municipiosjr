// Cargar el navbar y el footer
fetch("partials/navbar.html")
  .then((response) => response.text())
  .then((data) => {
    document.getElementById("navbarContainer").innerHTML = data;
  })
  .catch((error) => console.error("Error al cargar el navbar:", error));

fetch("partials/footer.html")
  .then((response) => response.text())
  .then((data) => {
    document.getElementById("footerContainer").innerHTML = data;
  })
  .catch((error) => console.error("Error al cargar el footer:", error));

// Inicializar Quill con la barra de herramientas
var quill = new Quill("#editor", {
  theme: "snow",
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ["bold", "italic", "underline"],
      [{ list: "ordered" }, { list: "bullet" }],
      ["link", "image"],
    ],
  },
});

// Interceptar la inserción de imágenes y subirlas al servidor
quill.getModule("toolbar").addHandler("image", () => {
  const input = document.createElement("input");
  input.setAttribute("type", "file");
  input.setAttribute("accept", "image/*");
  input.click();

  input.onchange = () => {
    const file = input.files[0];
    if (file) {
      const formData = new FormData();
      formData.append("image", file);

      // Enviar la imagen al servidor
      fetch("upload_image.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          const range = quill.getSelection();
          quill.insertEmbed(range.index, "image", data.url);
        })
        .catch((error) => {
          console.error("Error al cargar la imagen:", error);
        });
    }
  };
});

// Array de ejemplo con noticias (esto se reemplazaría con datos de la base de datos)
const newsData = [
  {
    title: "Título de la Noticia 1",
    body: "Este es el contenido completo de la noticia 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    image: "https://via.placeholder.com/600x300",
  },
  {
    title: "Título de la Noticia 2",
    body: "Este es el contenido completo de la noticia 2. Praesent suscipit urna a libero bibendum, et fringilla purus volutpat.",
    image: "https://via.placeholder.com/600x300",
  },
  {
    title: "Título de la Noticia 3",
    body: "Este es el contenido completo de la noticia 3. Cras at dolor eu orci congue scelerisque et eu ligula.",
    image: "https://via.placeholder.com/600x300",
  },
];

function limpiarContenido(cuerpo) {
  // Elimina las barras invertidas antes de las comillas
  return cuerpo.replace(/\\"/g, '"').replace(/\\+/g, "'");
}

function guardarContenido() {
  const titulo = document.getElementById("titulo").value;
  const imagen = "Imagen.jpg"; // Asegúrate de asignar correctamente la imagen
  const id_u = "1"; // Esto se puede cambiar dependiendo de la sesión
  const id_d = "1"; // También, depende de tu lógica
  let cuerpo = quill.root.innerHTML;

  // Limpiar el contenido antes de enviarlo
  cuerpo = limpiarContenido(cuerpo);

  console.log({
    titulo,
    cuerpo,
    imagen,
    id_usuario: id_u,
    id_dependencia: id_d,
  });

  fetch("guardar_contenido.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      titulo: titulo,
      cuerpo: cuerpo,
      imagen: imagen,
      id_usuario: id_u,
      id_dependencia: id_d,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
    })
    .catch((error) => {
      console.error("Error al guardar el contenido:", error);
    });
}
// Función para manejar el envío del formulario
function submitNews() {
  // Obtener el contenido del editor Quill y ponerlo en el campo oculto
  document.getElementById("newsBody").value = quill.root.innerHTML;
  return true; // Permitir el envío del formulario
}

// Mostrar u ocultar el botón "Back to Top"
window.onscroll = function () {
  const backToTopButton = document.getElementById("backToTop");
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
  }
};

// Cargar noticias en el contenedor
const newsContainer = document.getElementById("newsContainer");
newsData.forEach((news, index) => {
  const card = document.createElement("div");
  card.classList.add("col-md-4", "mb-4");
  card.innerHTML = `
            <div class="card h-100">
                <img src="${
                  news.image
                }" class="card-img-top" alt="Imagen de la noticia">
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
  document.getElementById("newsModalLabel").innerText = newsData[index].title;
  document.getElementById("newsModalImage").src = newsData[index].image;
  document.getElementById("newsModalBody").innerText = newsData[index].body;
}

//Pagina de editar noticiaas

// Inicializar Quill para el editor de noticias
var quillEditor = new Quill("#newsEditor", {
  theme: "snow",
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ["bold", "italic", "underline"],
      [{ list: "ordered" }, { list: "bullet" }],
      ["link", "image"],
    ],
  },
});

// Cargar la lista de noticias al dropdown
function loadNewsOptions() {
  fetch("obtener_noticias.php") // Archivo PHP que devuelve las noticias en JSON
    .then((response) => response.json())
    .then((data) => {
      const newsDropdown = document.getElementById("newsId");
      data.forEach((news) => {
        const option = document.createElement("option");
        option.value = news.id;
        option.textContent = news.titulo;
        newsDropdown.appendChild(option);
      });
    })
    .catch((error) => console.error("Error al cargar las noticias:", error));
}

// Cargar datos de la noticia seleccionada
function loadNews() {
  const newsId = document.getElementById("newsId").value;
  if (!newsId) return;

  fetch(`obtener_noticia.php?id=${newsId}`) // Endpoint que devuelve los datos de una noticia específica
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("newsTitle").value = data.titulo;
      quillEditor.root.innerHTML = data.cuerpo; // Cargar contenido en el editor
    })
    .catch((error) => console.error("Error al cargar la noticia:", error));
}

// Actualizar la noticia
function updateNews() {
  const newsId = document.getElementById("id").value;
  const titulo = document.getElementById("titulo").value;
  const cuerpo = quillEditor.root.innerHTML;

  if (!newsId || !titulo || !cuerpo) {
    alert("Por favor, completa todos los campos.");
    return;
  }

  fetch("editar_noticia.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ id: newsId, titulo: titulo, cuerpo: cuerpo }),
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
    })
    .catch((error) => console.error("Error al guardar la noticia:", error));
}

// Llamar a la función para cargar las opciones al cargar la página
document.addEventListener("DOMContentLoaded", loadNewsOptions);

// Eliminar noticia
function eliminarNoticia(id) {
  if (confirm("¿Estás seguro de que deseas eliminar esta noticia?")) {
    // Enviar una solicitud AJAX para eliminar la noticia
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "eliminar_noticia.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      if (xhr.status == 200) {
        alert("Noticia eliminada exitosamente");
        location.reload(); // Recargar la página después de eliminar
      } else {
        alert("Error al eliminar la noticia");
      }
    };
    xhr.send("id=" + id);
  }
}

