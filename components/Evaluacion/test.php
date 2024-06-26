<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../../';
session_start();
require '../conexion.php';
$conexion = conexion();

$tema = $_SESSION["tema"];

$preguntasMult = "SELECT * FROM pregunta_opmultiple WHERE id_tema = '$tema'";
$queryMult = mysqli_query($conexion, $preguntasMult);
$cPreguntasMult = mysqli_num_rows($queryMult);

$preguntasTF = "SELECT * FROM pregunta_verd_fal WHERE id_tema = '$tema'";
$queryTF = mysqli_query($conexion, $preguntasTF);
$cPreguntasTF = mysqli_num_rows($queryTF);

$preguntasTotales = $cPreguntasMult + $cPreguntasTF;

if (isset($_SESSION["usuario"]) && isset($_SESSION["tema"])) {
    $idTema = $_SESSION["tema"];
    $traerTema = "SELECT * FROM tema WHERE id_tema ='$idTema'";
    $queryTema = mysqli_query($conexion, $traerTema);
    $fetchTema = mysqli_fetch_assoc($queryTema);
    $nombreTema = $fetchTema["nombre_tema"];
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
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/preguntas.css">
    </head>

    <body>
        <?php require($ruta . 'layouts/nav.php'); ?>

        <div class="container">
            <div class="row  text-center  mt-5 mb-5">
                <div class="col-sm">
                    <h2 class="titulo display-1 my-auto">Test tema <?php echo $idTema . ': ' . $nombreTema; ?></h2>
                </div>
            </div>

            <div class="row text-center mx-3 mt-5 mb-5">
                <div class="col-sm">
                    <img class="img-fluid" src="../../assets/cd.avif" alt="">
                </div>
            </div>

            <div class="row text-center mx-3 my-5">
                <div class="col-sm">
                    <p class="titulo my-auto" style="font-size: 28px;">¡Bienvenido al test número <?php echo $idTema; ?> de nuestro curso de Ciencia de Datos! <br> Por favor contesta las siguientes preguntas sobre el tema <?php echo $idTema . ': ' . $nombreTema; ?>.</p>
                </div>
            </div>
            <form action="respuestas.php" method="post">
                <div class="row">
                    <?php
                    $contador = 1;
                    if ($cPreguntasMult > 0 or $cPreguntasTF > 0) {
                    ?>

                        <?php
                        if ($cPreguntasMult > 0) {
                            while ($preguntaOp = mysqli_fetch_assoc($queryMult)) {
                                $orden = rand(1, 4);
                                $idPregunta = $preguntaOp["id_pregunta"];
                                $preguntaMtexto = $preguntaOp["pregunta"];
                                $respuestaMcorrecta = $preguntaOp["respuesta_correcta"];
                                $respuestaMincorrecta1 = $preguntaOp["respuesta_incorrecta1"];
                                $respuestaMincorrecta2 = $preguntaOp["respuesta_incorrecta2"];
                                $respuestaMincorrecta3 = $preguntaOp["respuesta_incorrecta3"];
                        ?>
                                <div class="col-md-4 my-3">
                                    <div class="card mx-auto" style="max-width: 25rem; border-color: rgb(18, 168, 255);">
                                        <div class="card-body" style="color: rgb(18, 168, 255); background-color: #000;">
                                            <h5 class="card-title text-center">Pregunta <?php echo $contador; ?></h5>
                                            <p class="card-text"><?php echo $preguntaMtexto; ?></p>
                                        </div>
                                        <input type="hidden" value="<?php echo $idPregunta; ?>" name="numPregunta_<?php echo $contador; ?>">
                                        <ul class="list-group list-group-flush p-3" style="background-color: rgb(18, 168, 255);">
                                            <?php
                                            if ($orden == 1) {
                                            ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMcorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta2; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta3; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault2_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta1; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php
                                            } elseif ($orden == 2) {
                                            ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault2_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta1; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta3; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMcorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta2; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php
                                            } elseif ($orden == 3) {
                                            ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta3; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMcorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta2; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault2_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta1; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php
                                            } elseif ($orden == 4) {
                                            ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta3; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta2; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault2_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta1; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMcorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div> <!-- .card -->
                            <?php
                                $contador += 1;
                            }
                        }

                        if ($cPreguntasTF > 0) {
                            # WHILE TRUE / FALSE
                            while ($preguntaTF = mysqli_fetch_assoc($queryTF)) {
                                $orden = rand(1, 2);
                                $idPregunta = $preguntaTF["id_pregunta"];
                                $preguntaMtexto = $preguntaTF["pregunta"];
                                $respuestaMcorrecta = $preguntaTF["respuesta_correcta"];
                                $respuestaMincorrecta = $preguntaTF["respuesta_incorrecta"];
                            ?>
                                <div class="col-md-4 my-3">
                                    <div class="card mx-auto" style="max-width: 25rem; border-color: rgb(18, 168, 255);">
                                        <div class="card-body" style="color: rgb(18, 168, 255); background-color: #000;">
                                            <h5 class="card-title text-center">Pregunta <?php echo $contador; ?></h5>
                                            <p class="card-text"><?php echo $preguntaMtexto; ?></p>
                                        </div>
                                        <input type="hidden" value="<?php echo $idPregunta; ?>" name="numPregunta_<?php echo $contador; ?>">
                                        <ul class="list-group list-group-flush p-3" style="background-color: rgb(18, 168, 255);">
                                            <?php
                                            if ($orden == 1) {
                                            ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMcorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php
                                            } elseif ($orden == 2) {
                                            ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMincorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                        <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                            <?php echo $respuestaMcorrecta; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div> <!-- .card -->
                        <?php
                                $contador += 1;
                            }
                        }
                    } else {
                        ?>
                        <h2 class="titulo display-1 my-auto text-center">No hay preguntas por contestar</h2>
                    <?php
                        $botonActivado = 'no';
                    }
                    ?>
                </div>
                <input type="hidden" value="<?php echo $idTema; ?>" name="idTema">
                <input type="hidden" value="<?php echo $cPreguntasMult; ?>" name="cantidadPmult">
                <input type="hidden" value="<?php echo $cPreguntasTF; ?>" name="cantidadPtf">
                <input type="hidden" value="<?php echo $preguntasTotales; ?>" name="cantidadP">
                <?php
                if (!isset($botonActivado)) {
                ?>
                    <button class="btn fw-bold mt-5 d-block mx-auto" style="background-color: rgb(18, 168, 255); color: #000; font-size: 20px; max-width: 250px;" type="submit">Enviar Test</button>
                <?php
                }
                ?>
            </form>

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
    header("Location: ../CrearCuenta.php");
    exit;
}
?>