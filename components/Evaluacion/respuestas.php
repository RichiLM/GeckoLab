<?php
// Este codigo solo Jayme Ernesto Lin lo entiende
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

    $verRespuestas = "SELECT * FROM calificacion WHERE id_tema = '$idTema' AND id_usuario = '$idUsuario'";
    $revisarRespuestas = mysqli_query($conexion, $verRespuestas);

    if (!mysqli_num_rows($revisarRespuestas) > 0) {
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
        # Si ya existen respuestas
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

            $existePreg = "SELECT * FROM evaluacion_multiple WHERE id_pregunta = $idsPreguntas[$m]";
            $verExiste = mysqli_query($conexion, $existePreg);

            if (mysqli_num_rows($verExiste) > 0) {
                $updateM = "UPDATE evaluacion_multiple SET respuesta_usuario = '$respuestas[$m]', puntaje = '$puntaje' WHERE id_pregunta = '$idsPreguntas[$m]' AND id_usuario = '$idUsuario' AND id_tema = '$idTema'";
                mysqli_query($conexion, $updateM);
            } else {
                $insertM = "INSERT INTO evaluacion_multiple VALUES ('$idUsuario', '$idsPreguntas[$m]', '$idTema', '$respuestas[$m]', '$puntaje')";
                mysqli_query($conexion, $insertM);
            }
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

            $existePregTF = "SELECT * FROM evaluacion_verdadero_fal WHERE id_pregunta = $idsPreguntas[$m]";
            $verExisteTF = mysqli_query($conexion, $existePregTF);

            if (mysqli_num_rows($verExisteTF) > 0) {
                $updateTF = "UPDATE evaluacion_verdadero_fal SET respuesta_usuario = '$respuestas[$tf]', puntaje = '$puntaje' WHERE id_pregunta = '$idsPreguntas[$tf]' AND id_usuario = '$idUsuario' AND id_tema = '$idTema'";
                mysqli_query($conexion, $updateTF);
            } else {
                $insertTF = "INSERT INTO evaluacion_verdadero_fal VALUES ('$idUsuario', '$idsPreguntas[$tf]', '$idTema', '$respuestas[$tf]', '$puntaje')";
                mysqli_query($conexion, $insertTF);
            }
        }

        $calificacion = ($aciertos * 10) / $cantidadPreg;

        $updateCal = "UPDATE calificacion SET puntuacion = '$calificacion' WHERE id_usuario = '$idUsuario' AND id_tema = '$idTema'";
        mysqli_query($conexion, $updateCal);
    }
} else {
    header('Location: ../curso.php');
    exit();
}
