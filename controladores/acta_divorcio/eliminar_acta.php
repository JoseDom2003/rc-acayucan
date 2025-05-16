<?php
    include ("../../database/conexion.php");

    $id = $_GET['id'];
    $query = $conexion->query("DELETE FROM acta_divorcio WHERE id_acta = $id");

    if($query === TRUE){
        header("location:../../view/form/form-acta-divorcio/registros_divorcio.php");
    } else {
        echo "Error: " . $conexion->error;
    }
?>