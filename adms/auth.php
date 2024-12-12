<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al login si no está autenticado
    header("Location: login.html");
    exit();
}

// (Opcional) Verificar roles (ejemplo: solo Administradores)
if ($_SESSION['user_type'] != 1) { // Tipo de usuario 1 = Administrador
    echo "<script>alert('Acceso no autorizado.'); window.location.href = 'login.html';</script>";
    exit();
}
?>
