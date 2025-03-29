<?php

include_once("../../database/conexion.php");

$id = $_POST['id'];
$num_libro = $_POST ['num_libro'];
$num_acta = $_POST ['num_acta'];
$fecha_registro = $_POST['fecha_registro'];
$nombre_difunto = $_POST['nombre_difunto'];
$hora_defuncion = $_POST['hora_defuncion'];
$fecha_defuncion = $_POST['fecha_defuncion'];
$lugar_defuncion = $_POST['lugar_defuncion'];
$old_acta_digital = $_POST['old_acta_digital'];

// Procesar el archivo acta_digital si se ha subido uno nuevo
if(isset($_FILES['acta_digital']) && $_FILES['acta_digital']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "../../storage/pdfs_defuncion/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["acta_digital"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if($fileType != "pdf") {
        // Aquí podrías manejar el error (por ejemplo, redireccionar con un mensaje)
        die("Solo se permiten archivos PDF.");
    } else {
        if(move_uploaded_file($_FILES["acta_digital"]["tmp_name"], $target_file)) {
            $acta_digital = basename($_FILES["acta_digital"]["name"]);
        } else {
            die("Error al subir el archivo.");
        }
    }
} else {
    // Si no se sube un nuevo archivo, se conserva el existente
    $acta_digital = $old_acta_digital;
}


$sql = "UPDATE acta_defuncion SET 
num_libro='".$num_libro."',
num_acta='".$num_acta."',
fecha_registro='".$fecha_registro."',
nombre_difunto='".$nombre_difunto."',
hora_defuncion='".$hora_defuncion."',
fecha_defuncion='".$fecha_defuncion."',
lugar_defuncion='".$lugar_defuncion."',
acta_digital='".$acta_digital."' WHERE id_acta='".$id."'";

if($resultado = $conexion->query($sql)){
    header("location:../../view/form/form-acta-defuncion/registros_defuncion.php?success=2");
    exit();
}else{
    header("location:../../view/form/form-acta-defuncion/registros_defuncion.php?error=1");
    exit();
}
?>