<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();
require 'conexion.php';
$conexion = conexion();

$idTema = $_GET["id_curso"];

if (isset($_SESSION["usuario"]) && isset($_GET["id_curso"])) {
    $nombreUsuario = $_SESSION["usuario"];
    $traerIdUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
    $queryUsuario = mysqli_query($conexion, $traerIdUsuario);
    $datosUsuario = mysqli_fetch_assoc($queryUsuario);
    $idUsuario = $datosUsuario["id"];

    $idTema = $_GET["id_curso"];

    $traerCal = "SELECT * FROM calificacion JOIN tema ON calificacion.id_tema = tema.id_tema WHERE id_usuario = '$idUsuario' AND calificacion.id_tema = '$idTema'";
    $queryCal = mysqli_query($conexion, $traerCal);

    $fetchCal = mysqli_fetch_assoc($queryCal);
    $nombreTema = $fetchCal["nombre_tema"];
    $calificacion = $fetchCal["puntuacion"];

    $aciertos = 0;
    $errores = 0;
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gecko-Lab</title>
        <link rel="icon" href="<?php echo $ruta . 'assets/Logos/icono1.png'; ?>" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php require($ruta . 'layouts/nav.php'); ?>

        <div class="container">
            <h1 class="titulo text-center mt-5">Mis resultados</h1>
            <div class="container-fluid" style="border: solid 1px rgb(18, 168, 255); border-radius: 5px;">
                <h2 class="titulo text-center my-3">Resultados del tema <?php echo $nombreTema; ?></h2>
                <?php
                $traerPreguntasM = "SELECT * FROM evaluacion_multiple JOIN pregunta_opmultiple ON evaluacion_multiple.id_pregunta = pregunta_opmultiple.id_pregunta WHERE evaluacion_multiple.id_tema = '$idTema' AND id_usuario = '$idUsuario'";
                $queryPreguntasM = mysqli_query($conexion, $traerPreguntasM);

                if (mysqli_num_rows($queryPreguntasM) > 0) {
                ?>
                    <div class="m-3">
                        <h3 class="titulo my-5">Preguntas opción multiple (<?php echo mysqli_num_rows($queryPreguntasM); ?>)</h3>
                        <div class="row text-center fw-bold" style="font-size: 20px; color: rgb(18, 168, 255); border-bottom: solid 2px rgb(18, 168, 255);">
                            <div class="col-md-8">
                                <p>Pregunta</p>
                            </div>
                            <div class="col-md-2">
                                <p>Respuesta</p>
                            </div>
                            <div class="col-md-2">
                                <p>Puntaje</p>
                            </div>
                        </div>
                        <?php
                        while ($fetchM = mysqli_fetch_assoc($queryPreguntasM)) {
                            $preguntaM = $fetchM["pregunta"];
                            $respuestaM = $fetchM["respuesta_usuario"];
                            $puntajeM = $fetchM["puntaje"];
                        ?>
                            <div class="row text-center text-white" style="font-size: 20px; border-bottom: solid 2px rgb(18, 168, 255);">
                                <div class="col-md-8">
                                    <p><?php echo $preguntaM; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><?php echo $respuestaM; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <?php
                                    if ($puntajeM == 0) {
                                    ?>
                                        <p class="text-danger">Incorrecto</p>
                                    <?php
                                        $errores += 1;
                                    } else {
                                    ?>
                                        <p class="text-success">Correcto</p>
                                    <?php
                                        $aciertos += 1;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div> <!-- Preguntas opción multiple -->
                <?php
                }

                $traerPreguntasTF = "SELECT * FROM evaluacion_verdadero_fal JOIN pregunta_verd_fal ON evaluacion_verdadero_fal.id_pregunta = pregunta_verd_fal.id_pregunta WHERE evaluacion_verdadero_fal.id_tema = '$idTema' AND id_usuario = '$idUsuario'";
                $queryPreguntasTF = mysqli_query($conexion, $traerPreguntasTF);

                if (mysqli_num_rows($queryPreguntasTF) > 0) {
                ?>
                    <div class="m-3">
                        <h3 class="titulo my-5">Preguntas verdadero/falso (<?php echo mysqli_num_rows($queryPreguntasTF); ?>)</h3>
                        <div class="row text-center fw-bold" style="font-size: 20px; color: rgb(18, 168, 255); border-bottom: solid 2px rgb(18, 168, 255);">
                            <div class="col-md-8">
                                <p>Pregunta</p>
                            </div>
                            <div class="col-md-2">
                                <p>Respuesta</p>
                            </div>
                            <div class="col-md-2">
                                <p>Puntaje</p>
                            </div>
                        </div>
                        <?php
                        while ($fetchTF = mysqli_fetch_assoc($queryPreguntasTF)) {
                            $preguntaTF = $fetchTF["pregunta"];
                            $respuestaTF = $fetchTF["respuesta_usuario"];
                            $puntajeTF = $fetchTF["puntaje"];
                        ?>
                            <div class="row text-center text-white" style="font-size: 20px; border-bottom: solid 2px rgb(18, 168, 255);">
                                <div class="col-md-8">
                                    <p><?php echo $preguntaTF; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><?php echo $respuestaTF; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <?php
                                    if ($puntajeTF == 0) {
                                    ?>
                                        <p class="text-danger">Incorrecto</p>
                                    <?php
                                        $errores += 1;
                                    } else {
                                    ?>
                                        <p class="text-success">Correcto</p>
                                    <?php
                                        $aciertos += 1;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div><!-- Preguntas verdadero/falso -->
                    <div class="m-3">
                        <h3 class="titulo mt-5 mb-3">Resumen</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-danger" style="font-size: 20px;"><span class="titulo fw-bold">Errores: </span><?php echo $errores; ?></p>
                                <p class="text-success" style="font-size: 20px;"><span class="titulo fw-bold">Aciertos: </span><?php echo $aciertos; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Preguntas totales: </span><?php echo $errores + $aciertos; ?></p>
                                <?php
                                if ($calificacion < 6) {
                                ?>
                                    <p class="text-danger" style="font-size: 20px;"><span class="titulo fw-bold">Calificación: </span><?php echo $calificacion; ?></p>
                                <?php
                                } else {
                                ?>
                                    <p class="text-success" style="font-size: 20px;"><span class="titulo fw-bold">Calificación: </span><?php echo $calificacion; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div><!-- Preguntas verdadero/falso -->
                <?php
                }
                ?>
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
    header('Location: progreso.php');
    exit();
}
?>