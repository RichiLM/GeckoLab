<?php

session_start();
require '../conexion.php';
$conexion = conexion();

$respuestas = array();

for($i = 1; $i <= 10; $i++){
    $respuestas[$i] = $_POST["respuesta_$i"];
}
?>