<?php
// Este codigo solo Jayme Ernesto Lin lo entiende
$ruta = '../../';
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
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gecko - Lab</title>
        <link rel="icon" href="<?php echo $ruta . 'assets/Logos/icono1.png'; ?>" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../../css/style.css">
    </head>

    <body>
        <?php require($ruta . 'layouts/nav.php'); ?>


        <div class="container">
            <div class="row  text-center  mt-5 mb-5">
                <div class="col-sm">
                    <h2 class="titulo display-1 my-auto">Gracias por contestar el test</h2>
                </div>
            </div>

            <div class="row text-center mx-3 mt-5 mb-5">
                <div class="col-sm">
                    <img class="img-fluid" src="../../assets/progra.jpg" alt="">
                </div>
            </div>

            <div class="row text-center mx-3 mt-5 mb-5">
                <div class="col-sm">
                    <p class="titulo display-1 my-auto" style="font-size: 40px;">Ahora puedes continuar con tu aprendizaje.</p>
                    <a href="../curso.php" class="btn fw-bold mt-5 d-block mx-auto" style="background-color: rgb(18, 168, 255); color: #000; font-size: 20px; max-width: 200px;">Ver cursos</a>
                </div>
            </div>
        </div>

        <?php
        require($ruta .  'layouts/footer.php');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header('Location: ../curso.php');
    exit();
}
