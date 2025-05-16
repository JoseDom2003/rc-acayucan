<?php 

include("../../database/conexion.php");

$id_tipo_acta = $_POST['tipo_acta'];
$num_libro = $_POST['num_libro'];
$num_acta = $_POST['num_acta'];
$nombre_divorciado1 = $_POST['nombre_divorciado1'];
$nombre_divorciado2 = $_POST['nombre_divorciado2'];
$fecha_divorcio = $_POST['fecha_divorcio'];
$disolucion = $_POST['disolucion'];
$uploadedFile = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['acta_digital']["name"])) {
    // Directorio donde se guardarán los archivos
    $target_dir = "../../storage/pdfs_divorcio/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    // Nombre del archivo
    $target_file = $target_dir . basename($_FILES["acta_digital"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Validar que sea PDF
    if ($fileType != "pdf") {
        $error = "Solo se permiten archivos PDF.";
    } else {
        if (move_uploaded_file($_FILES["acta_digital"]["tmp_name"], $target_file)) {
            $uploadedFile = basename($_FILES["acta_digital"]["name"]);
        } else {
            $error = "Error al subir el archivo.";
        }
    }
}

$sql = "INSERT INTO acta_divorcio (id_tipo_acta, num_libro, num_acta, nombre_divorciado1, nombre_divorciado2, fecha_divorcio, disolucion, acta_digital) 
VALUES ('$id_tipo_acta', '$num_libro', '$num_acta', '$nombre_divorciado1', '$nombre_divorciado2', '$fecha_divorcio', '$disolucion', '$uploadedFile')";

$resultado = mysqli_query($conexion, $sql) or die("Error en la consulta: " . mysqli_error($conexion));
if ($resultado === TRUE) {
    header("location:../../view/form/form-acta-divorcio/registros_divorcio.php?success=1");
    exit();
} else {
    echo "Datos no insertados";
}

?>