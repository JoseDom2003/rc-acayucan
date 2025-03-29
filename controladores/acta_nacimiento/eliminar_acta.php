<?php
    include ("../../database/conexion.php");

    $id = $_GET['id'];
    $query = $conexion->query("DELETE FROM actas_nacimiento WHERE id_acta = $id");

    if($query === TRUE){
        header("location:../../view/form/form-acta-nacimiento/registros_nacimiento.php");
    } else {
        echo "Error: " . $conexion->error;
    }
?>
