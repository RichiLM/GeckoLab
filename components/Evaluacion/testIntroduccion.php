<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../../';
session_start();
require '../conexion.php';
$conexion = conexion();

$tema = 1;

$preguntasMult = "SELECT * FROM pregunta_opmultiple WHERE id_tema = '$tema'";
$queryMult = mysqli_query($conexion, $preguntasMult);

$preguntasTF = "SELECT * FROM pregunta_verd_fal WHERE id_tema = '$tema'";
$queryTF = mysqli_query($conexion, $preguntasTF);

if (isset($_SESSION["usuario"])) {
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
                    <h2 class="titulo display-1 my-auto">Test tema 1: Introducción a la Ciencia de Datos</h2>
                </div>
            </div>

            <div class="row text-center mx-3 mt-5 mb-5">
                <div class="col-sm">
                    <img class="img-fluid" src="../../assets/cd.avif" alt="">
                </div>
            </div>

            <div class="row text-center mx-3 my-5">
                <div class="col-sm">
                    <p class="titulo my-auto" style="font-size: 28px;">¡Bienvenido al primer test de nuestro curso de Ciencia de Datos! <br> Por favor contesta las siguientes preguntas sobre el tema 1: Introducción a la Ciencia de Datos.</p>
                </div>
            </div>

            <div class="row">
                <?php
                $contador = 1;
                if (mysqli_num_rows($queryMult) > 0 or mysqli_num_rows($queryTF) > 0) {
                    if (mysqli_num_rows($queryMult) > 0) {
                        while ($preguntaOp = mysqli_fetch_assoc($queryMult)) {
                            $orden = rand(1, 4);

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
                                    <ul class="list-group list-group-flush p-3" style="background-color: rgb(18, 168, 255);">
                                        <?php
                                        if ($orden == 1) {
                                        ?>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMcorrecta; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta2; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta3; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
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
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault2_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta1; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta3; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMcorrecta; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
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
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta3; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMcorrecta; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta2; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
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
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault4_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta3; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault4_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta3; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta2; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault2_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta1; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault2_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta1; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
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

                    if (mysqli_num_rows($queryTF) > 0) {
                        # WHILE TRUE / FALSE
                        while ($preguntaTF = mysqli_fetch_assoc($queryTF)) {
                            $orden = rand(1, 2);

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
                                    <ul class="list-group list-group-flush p-3" style="background-color: rgb(18, 168, 255);">
                                        <?php
                                        if ($orden == 1) {
                                        ?>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault1_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMcorrecta; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
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
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault3_<?php echo $contador; ?>" value="<?php echo $respuestaMincorrecta2; ?>">
                                                    <label class="form-check-label" for="flexRadioDefault3_<?php echo $contador; ?>">
                                                        <?php echo $respuestaMincorrecta; ?>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="respuesta_<?php echo $contador; ?>" id="flexRadioDefault1_<?php echo $contador; ?>" value="<?php echo $respuestaMcorrecta; ?>">
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
                }
                ?>
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
    header("Location: ../CrearCuenta.php");
    exit;
}
?>