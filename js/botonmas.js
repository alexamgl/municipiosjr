function toggleContent(button) {
    const content = button.nextElementSibling; // Obtiene el siguiente elemento (el div con la información)
    if (content.style.display === "none") {
        content.style.display = "block"; // Muestra el contenido
        button.textContent = "-"; // Cambia el texto del botón a "-"
    } else {
        content.style.display = "none"; // Oculta el contenido
        button.textContent = "+"; // Cambia el texto del botón a "+"
    }
}