<?php
$target_dir = "../../adms/uploads/";
$target = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $temp_name = $_FILES['image']['tmp_name'];
    $file_name = uniqid() . "_" . basename($_FILES['image']['name']);
    $target_file = $target . $file_name;
    $target_img = $target_dir . $file_name;

    if (move_uploaded_file($temp_name, $target_file)) {
        // Devuelve la URL de la imagen
        echo json_encode(['url' => $target_img]);
    } else {
        echo json_encode(['error' => 'Error al mover la imagen.']);
    }
} else {
    echo json_encode(['error' => 'Error al cargar la imagen.']);
}
?>
