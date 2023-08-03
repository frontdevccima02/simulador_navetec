<?php
require_once "php/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera el valor del campo "Nombre" del formulario
    $nombre = $_POST["name"];
    $date = $_POST["date"];
    $Lote = $_POST["lote"];
    $desarrolloid = $_POST["desarrolloid"];
    $clusterid = $_POST["clusterid"];
    $lote = $_POST["lote"];
    $descuento = $_POST["descuento"];
    $area = $_POST["area"];
    $tipo = $_POST["tipo"];
    $tiempo = $_POST["tiempo"];
    $enganche = $_POST["engancheextra"];
    $descuentoe = $_POST["descuentoe"];


    // Realiza la consulta INSERT para insertar el valor en la base de datos
    $query = "INSERT INTO datos (nombre, fecha, lote, desarrollo, condominio, descuento, metros, tipo, tiempo, engancheE, desenganche) 
    VALUES ('$nombre','$date','$lote','$desarrolloid','$clusterid','$descuento','$area','$tipo','$tiempo','$enganche','$descuentoe')";
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
} 
?>