                function validatePhone(input) {
    // Elimina cualquier carácter que no sea un número
    input.value = input.value.replace(/\D/g, '');

    // Verifica si la longitud es mayor a 10 y la corta si es necesario
    if (input.value.length > 10) {
        input.value = input.value.slice(0, 10);
    }

    // Verifica si es válido (10 dígitos)
    if (input.value.length === 10) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
}

document.getElementById("miFormulario").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que se recargue la página

    // Simulación de envío de datos
    const modal = new bootstrap.Modal(document.getElementById("resultadoModal"));
    const mensajeModal = document.getElementById("mensajeModal");

    if (datosEnviados) {
        mensajeModal.textContent = "Datos enviados correctamente.";
    } else {
        mensajeModal.textContent = "Error al enviar los datos.";
    }

    modal.show(); // Muestra el modal
});


    document.getElementById('formulario_hola').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que se recargue la página

        const formData = new FormData(this); // Obtener los datos del formulario

        fetch('mejoraregulatoria.html', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Aquí puedes manejar la respuesta del servidor
            console.log(data); // Para depuración, puedes ver la respuesta en la consola

            // Vaciar los campos del formulario
            this.reset();

            // Mostrar el modal de éxito
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
