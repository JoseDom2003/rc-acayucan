<?php
    include ("../../database/conexion.php");

    $id = $_GET['id'];
    $query = $conexion->query("DELETE FROM acta_defuncion WHERE id_acta = $id");

    if($query === TRUE){
        header("location:../../view/form/form-acta-defuncion/registros_defuncion.php");
    } else {
        echo "Error: " . $conexion->error;
    }
?>
