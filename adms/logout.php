<?php
session_start(); // Iniciar sesión
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location: login.html"); // Redirigir al login
exit();
?>
