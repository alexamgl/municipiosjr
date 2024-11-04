// Función para obtener la hora actual
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    document.getElementById('time').innerText = `Hora actual: ${timeString}`;
}

// Función para obtener el clima de San Juan del Río usando la API de Open-Meteo
async function updateWeather() {
    const url = 'https://api.open-meteo.com/v1/forecast?latitude=20.3889&longitude=-99.9958&hourly=temperature_2m&timezone=America/Mexico_City';

    try {
        const response = await fetch(url);
        const data = await response.json();

        // Obtener la hora actual en formato ISO sin segundos para que coincida con el formato de la API
        const now = new Date();
        const currentHour = now.toISOString().slice(0, 13) + ":00"; // Formato 'YYYY-MM-DDTHH:00'

        // Buscar el índice que coincide con la hora actual en los datos de la API
        const hourly = data.hourly;
        const index = hourly.time.indexOf(currentHour);

        if (index !== -1) {
            // Si se encuentra la hora actual, obtener la temperatura
            const temperature = hourly.temperature_2m[index];
            document.getElementById('weather-info').innerText = `${temperature}°C, Pronóstico para las ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
        } else {
            // Si no se encuentra la hora actual en los datos
            document.getElementById('weather-info').innerText = 'No se pudo obtener el pronóstico para esta hora';
        }
    } catch (error) {
        document.getElementById('weather-info').innerText = 'No se pudo obtener el clima';
    }
}

// Actualizar la hora cada segundo y el clima cada minuto
setInterval(updateTime, 1000);
updateTime();
updateWeather();
setInterval(updateWeather, 60000);
