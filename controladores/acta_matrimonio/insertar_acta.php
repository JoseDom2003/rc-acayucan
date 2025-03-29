
<?php 

include("../../database/conexion.php");

$id_tipo_acta = $_POST['tipo_acta'];
$num_libro = $_POST ['num_libro'];
$num_acta = $_POST ['num_acta'];
$fecha_registro = $_POST['fecha_registro'];
$contrayente_masc = $_POST['contrayente_masc'];
$contrayente_fem = $_POST['contrayente_fem'];
$regimen = $_POST['regimen'];
$uploadedFile = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['acta_digital']["name"])) {
    // Directorio donde se guardarán los archivos
    $target_dir = "../../storage/pdfs_matrimonio/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    // Nombre del archivo
    $target_file = $target_dir . basename($_FILES["acta_digital"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Validar que sea PDF
    if($fileType != "pdf") {
         $error = "Solo se permiten archivos PDF.";
    } else {
         if (move_uploaded_file($_FILES["acta_digital"]["tmp_name"], $target_file)) {
            $uploadedFile = basename($_FILES["acta_digital"]["name"]);
         } else {
             $error = "Error al subir el archivo.";
         }
    }
}

$sql = "INSERT INTO acta_matrimonio (id_tipo_acta, num_libro, num_acta, fecha_registro, contrayente_masc, contrayente_fem, regimen, acta_digital) 
VALUES ('$id_tipo_acta','$num_libro', '$num_acta', '$fecha_registro', '$contrayente_masc', '$contrayente_fem', '$regimen', '$uploadedFile')";

$resultado = mysqli_query($conexion, $sql) or die("Error en la consulta: " . mysqli_error($conexion));
if ($resultado === TRUE){
    header("location:../../view/form/form-acta-matrimonio/registros_matrimonio.php?success=1");
    exit();
}else{
    echo "Datos no insertados";
}

?>