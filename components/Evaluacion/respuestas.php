<?php

session_start();
require '../conexion.php';
$conexion = conexion();

if (isset($_POST["idTema"]) && isset($_POST["cantidadPmult"]) && isset($_POST["cantidadPtf"]) && isset($_POST["cantidadP"])) {
    $idTema = $_POST["idTema"];
    $cantidadPmult = $_POST["cantidadPmult"];
    $cantidadPtf = $_POST["cantidadPtf"];
    $cantidadPreg = $_POST["cantidadP"];

    $nombreUsuario = $_SESSION["usuario"];
    $traerIdUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
    $queryUsuario = mysqli_query($conexion, $traerIdUsuario);
    $datosUsuario = mysqli_fetch_assoc($queryUsuario);
    $idUsuario = $datosUsuario["id"];

    $respuestas = array();
    $idsPreguntas = array();
    $aciertos = 0;

    for ($i = 1; $i <= $cantidadPreg; $i++) {
        $respuestas[$i] = $_POST["respuesta_$i"];
        $idsPreguntas[$i] = $_POST["numPregunta_$i"];
        echo $idsPreguntas[$i] . ' ' .  $respuestas[$i] . ' --- ';
    }

    for ($m = 1; $m <= $cantidadPmult; $m++) {
        $consultaMultiple = "SELECT * FROM pregunta_opmultiple WHERE id_pregunta = '$idsPreguntas[$m]'";
        $queryMultiple = mysqli_query($conexion, $consultaMultiple);

        $fetchMultiple = mysqli_fetch_assoc($queryMultiple);
        $respuestaCorrectaM = $fetchMultiple["respuesta_correcta"];

        if ($respuestas[$m] == $respuestaCorrectaM) {
            $puntaje = true;
            $aciertos += 1;
        } else {
            $puntaje = false;
        }

        $insertM = "INSERT INTO evaluacion_multiple VALUES ('$idUsuario', '$idsPreguntas[$m]', '$idTema', '$respuestas[$m]', '$puntaje')";
        mysqli_query($conexion, $insertM);
    }

    for ($tf = ($cantidadPreg - $cantidadPtf) + 1; $tf <= $cantidadPreg; $tf++) {
        $consultaTF = "SELECT * FROM pregunta_verd_fal WHERE id_pregunta = '$idsPreguntas[$tf]'";
        $queryTF = mysqli_query($conexion, $consultaTF);

        $fetchTF = mysqli_fetch_assoc($queryTF);
        $respuestaCorrectaTF = $fetchTF["respuesta_correcta"];

        if ($respuestas[$tf] == $respuestaCorrectaTF) {
            $puntaje = true;
            $aciertos += 1;
        } else {
            $puntaje = false;
        }

        $insertTF = "INSERT INTO evaluacion_verdadero_fal VALUES ('$idUsuario', '$idsPreguntas[$tf]', '$idTema', '$respuestas[$tf]', '$puntaje')";
        mysqli_query($conexion, $insertTF);
    }

    $calificacion = ($aciertos * 10) / $cantidadPreg;

    $insertCal = "INSERT INTO calificacion VALUES ('$idUsuario', '$idTema', '$calificacion')";
    mysqli_query($conexion, $insertCal);
} else {
    header('Location: ../curso.php');
    exit();
}

?>