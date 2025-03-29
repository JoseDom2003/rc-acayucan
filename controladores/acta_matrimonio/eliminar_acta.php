<?php
    include ("../../database/conexion.php");

    $id = $_GET['id'];
    $query = $conexion->query("DELETE FROM acta_matrimonio WHERE id_acta = $id");

    if($query === TRUE){
        header("location:../../view/form/form-acta-matrimonio/registros_matrimonio.php");
    } else {
        echo "Error: " . $conexion->error;
    }
?>
