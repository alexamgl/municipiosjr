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
        window.scrollTo({top: 0, behavior: 'smooth'});
    };

    // Función para abrir el chat
document.getElementById('chatbotButton').onclick = function() {
    document.getElementById('chatbotWindow').style.display = 'block';
};

// Función para cerrar el chat
function closeChat() {
    document.getElementById('chatbotWindow').style.display = 'none';
}

// Función para enviar mensajes
function sendMessage() {
    const userInput = document.getElementById('userInput').value;
    if (userInput) {
        const chatContent = document.querySelector('.chat-content');
        const userMessage = document.createElement('p');
        userMessage.textContent = userInput;
        chatContent.appendChild(userMessage);
        document.getElementById('userInput').value = '';
        chatContent.scrollTop = chatContent.scrollHeight; // Auto-scroll al final
    }
}

setTimeout(() => {
    const chatbotIndicator = document.getElementById('chatbotIndicator');
    if (chatbotIndicator) {
        chatbotIndicator.style.opacity = '0'; // Hacer que el texto desaparezca suavemente
    }
}, 7000);

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=document.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');

    // Función para mostrar el mensaje emergente
    function showPopup() {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    }

    // Función para cerrar el mensaje emergente
    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
    }

    // Muestra el mensaje al cargar la página
    window.onload = showPopup;


    document.getElementById('toggleContent').addEventListener('click', function() {
        const hiddenContent = document.querySelector('.hidden-content');
        const isVisible = hiddenContent.style.display === 'block';

        hiddenContent.style.display = isVisible ? 'none' : 'block';
        this.textContent = isVisible ? 'Ver más' : 'Ocultar';
    });
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
    document.querySelector('#showMoreCards').addEventListener('click', function(event) {
        event.preventDefault(); // Evitar el comportamiento por defecto
        const extraCards = document.getElementById('extraCards');
        const isVisible = extraCards.style.display === 'block';

        // Mostrar u ocultar el contenido adicional
        extraCards.style.display = isVisible ? 'none' : 'block';
        this.textContent = isVisible ? 'Ver más' : 'Ver menos';
    });


