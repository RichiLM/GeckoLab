<?php
function conexion()
{
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "gl";
    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);
    return $conexion;
}
?>