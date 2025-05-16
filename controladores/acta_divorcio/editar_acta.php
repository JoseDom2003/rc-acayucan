<?php

include_once("../../database/conexion.php");

$id = $_POST['id'];
$num_libro = $_POST['num_libro'];
$num_acta = $_POST['num_acta'];
$nombre_divorciado1 = $_POST['nombre_divorciado1'];
$nombre_divorciado2 = $_POST['nombre_divorciado2'];
$fecha_divorcio = $_POST['fecha_divorcio'];
$disolucion = $_POST['disolucion'];
$old_acta_digital = $_POST['old_acta_digital'];

// Procesar el archivo acta_digital si se ha subido uno nuevo
if (isset($_FILES['acta_digital']) && $_FILES['acta_digital']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "../../storage/pdfs_divorcio/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["acta_digital"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if ($fileType != "pdf") {
        // Aquí podrías manejar el error (por ejemplo, redireccionar con un mensaje)
        die("Solo se permiten archivos PDF.");
    } else {
        if (move_uploaded_file($_FILES["acta_digital"]["tmp_name"], $target_file)) {
            $acta_digital = basename($_FILES["acta_digital"]["name"]);
        } else {
            die("Error al subir el archivo.");
        }
    }
} else {
    // Si no se sube un nuevo archivo, se conserva el existente
    $acta_digital = $old_acta_digital;
}

$sql = "UPDATE acta_divorcio SET 
num_libro = '$num_libro',
num_acta = '$num_acta',
nombre_divorciado1 = '$nombre_divorciado1',
nombre_divorciado2 = '$nombre_divorciado2',
fecha_divorcio = '$fecha_divorcio',
disolucion = '$disolucion',
acta_digital = '$acta_digital' 
WHERE id_acta = '$id'";

if ($resultado = $conexion->query($sql)) {
    header("location:../../view/form/form-acta-divorcio/registros_divorcio.php?success=2");
    exit();
} else {
    header("location:../../view/form/form-acta-divorcio/registros_divorcio.php?error=1");
    exit();
}

?>