<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "db_rc-acayucan";

$conexion = new mysqli($host, $user, $password, $database);

    if ($conexion->connect_error) {
        die("La conexión ha fallado: " . $conexion->connect_error);
    }
?>