<?php
    // iot.php
    // Importamos la configuración
     require_once '../conexion.php'; 
    // Leemos los valores que nos llegan por GET
    $valor = mysqli_real_escape_string($con, $_GET['valor']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO diagnosticos(pulsaciones) VALUES('".$valor."')";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
?>