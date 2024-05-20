<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();
require 'conexion.php';
$conexion = conexion();

if (isset($_POST["borrarPregM"])) {
    $numPreg = $_POST["idPregM"];
    $numTema = $_POST["idTemaM"];

    $borrarRegPregM = "DELETE FROM evaluacion_multiple WHERE id_pregunta = '$numPreg' AND id_tema = '$numTema'";
    $borrarPregM = "DELETE FROM pregunta_opmultiple WHERE id_pregunta = '$numPreg' AND id_tema = '$numTema'";
    $eliminarME = mysqli_query($conexion, $borrarRegPregM);
    $eliminarM = mysqli_query($conexion, $borrarPregM);
}

if (isset($_POST["borrarPregTF"])) {
    $numPreg = $_POST["idPregTF"];
    $numTema = $_POST["idTemaTF"];

    $borrarRegPregTF = "DELETE FROM evaluacion_verdadero_fal WHERE id_pregunta = '$numPreg' AND id_tema = '$numTema'";
    $borrarPregTF = "DELETE FROM pregunta_verd_fal WHERE id_pregunta = '$numPreg' AND id_tema = '$numTema'";
    $eliminarTFE = mysqli_query($conexion, $borrarRegPregTF);
    $eliminarTF = mysqli_query($conexion, $borrarPregTF);
}

$nombreUsuario = $_SESSION["usuario"];
$traerIdUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
$queryUsuario = mysqli_query($conexion, $traerIdUsuario);
$datosUsuario = mysqli_fetch_assoc($queryUsuario);
$idUsuario = $datosUsuario["id"];

$consultarPermiso = "SELECT * FROM admin WHERE id_usuario = '$idUsuario'";
$verAdmin = mysqli_query($conexion, $consultarPermiso);

$fetchAdmin = mysqli_fetch_assoc($verAdmin);
$estatusAdmin = $fetchAdmin["permiso"];

if (isset($_SESSION["usuario"]) && $estatusAdmin == 1 && isset($_GET["nombreTema"])) {
    $tema = $_GET["nombreTema"];
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
        <div class="container-fluid">
            <?php
            $traerTemaGeneral = "SELECT * FROM tema WHERE nombre_tema = '$tema'";
            $resultTema = mysqli_query($conexion, $traerTemaGeneral);
            $fetchTema = mysqli_fetch_assoc($resultTema);
            $nombreTema = $fetchTema["nombre_tema"];

            #opcion multiple
            $traerTemaM = "SELECT * FROM tema JOIN pregunta_opmultiple ON tema.id_tema = pregunta_opmultiple.id_tema WHERE tema.nombre_tema = '$tema'";
            $queryTemaM = mysqli_query($conexion, $traerTemaM);
            ?>
            <h1 class="titulo text-center mt-5 mb-4">Preguntas tema <?php echo $nombreTema; ?></h1>
            <h2 class="titulo text-center mb-5">Preguntas opción multitple (<?php echo mysqli_num_rows($queryTemaM); ?> preguntas)</h2>
            <div class="row text-center" style="font-size: 20px; border-bottom: solid 1px rgb(18, 168, 255);">
                <div class="col-md-3">
                    <p class="fw-bold titulo">Pregunta</p>
                </div>
                <div class="col-md-2">
                    <p class="fw-bold titulo">Respuesta correcta</p>
                </div>
                <div class="col-md-2">
                    <p class="fw-bold titulo">Respuesta incorrecta</p>
                </div>
                <div class="col-md-2">
                    <p class="fw-bold titulo">Respuesta incorrecta</p>
                </div>
                <div class="col-md-2">
                    <p class="fw-bold titulo">Respuesta incorrecta</p>
                </div>
                <div class="col-md-1">
                    <p class="fw-bold titulo">Acción</p>
                </div>
            </div>

            <?php

            if (mysqli_num_rows($queryTemaM) > 0) {
                while ($fetchOM = mysqli_fetch_assoc($queryTemaM)) {
                    $idPreguntaM = $fetchOM["id_pregunta"];
                    $idTemaM = $fetchOM["id_tema"];
                    $preguntaM = $fetchOM["pregunta"];
                    $respuestaCorrectaM = $fetchOM["respuesta_correcta"];
                    $respuestaIncorrecta1 = $fetchOM["respuesta_incorrecta1"];
                    $respuestaIncorrecta2 = $fetchOM["respuesta_incorrecta2"];
                    $respuestaIncorrecta3 = $fetchOM["respuesta_incorrecta3"];
            ?>
                    <div class="row text-center align-items-center" style="border-bottom: solid 1px rgb(18, 168, 255);">
                        <div class="col-md-3">
                            <p class="fw-bold text-white"><?php echo $preguntaM; ?></p>
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold text-white"><?php echo $respuestaCorrectaM; ?></p>
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold text-white"><?php echo $respuestaIncorrecta1; ?></p>
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold text-white"><?php echo $respuestaIncorrecta2; ?></p>
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold text-white"><?php echo $respuestaIncorrecta3; ?></p>
                        </div>
                        <div class="col-md-1">
                            <form method="post">
                                <input type="hidden" name="idPregM" value="<?php echo $idPreguntaM; ?>">
                                <input type="hidden" name="idTemaM" value="<?php echo $idTemaM; ?>">
                                <button class="btn btn-warning my-2" type="submit" name="editarPregM">Editar</button>
                                <button class="btn btn-danger my-2" type="submit" name="borrarPregM">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h2 class="titulo text-center my-5">No hay preguntas opción multitple</h2>
            <?php
            }

            #verdadero / falso
            $traerTemaTF = "SELECT * FROM tema JOIN pregunta_verd_fal ON tema.id_tema = pregunta_verd_fal.id_tema WHERE tema.nombre_tema = '$tema'";
            $queryTemaTF = mysqli_query($conexion, $traerTemaTF);
            ?>
            <form action="crearPregM.php">
                <input type="hidden" name="idTM" value="<?php echo $idTemaM; ?>">
                <button class="btn btn-primary d-block mx-auto my-5" style="max-width: 150px;" type="submit">Añadir pregunta</button>
            </form>
            <h2 class="titulo text-center mt-5 my-5">Preguntas verdadero / falso (<?php echo mysqli_num_rows($queryTemaTF); ?> preguntas)</h2>
            <div class="row text-center" style="font-size: 20px; border-bottom: solid 1px rgb(18, 168, 255);">
                <div class="col-md-5">
                    <p class="fw-bold titulo">Pregunta</p>
                </div>
                <div class="col-md-3">
                    <p class="fw-bold titulo">Respuesta correcta</p>
                </div>
                <div class="col-md-3">
                    <p class="fw-bold titulo">Respuesta incorrecta</p>
                </div>
                <div class="col-md-1">
                    <p class="fw-bold titulo">Acción</p>
                </div>
            </div>
            <?php

            if (mysqli_num_rows($queryTemaTF) > 0) {
                while ($fetchTF = mysqli_fetch_assoc($queryTemaTF)) {
                    $idPreguntaTF = $fetchTF["id_pregunta"];
                    $idTemaTF = $fetchTF["id_tema"];
                    $preguntaTF = $fetchTF["pregunta"];
                    $respuestaCorrectaTF = $fetchTF["respuesta_correcta"];
                    $respuestaIncorrectaTF = $fetchTF["respuesta_incorrecta"];
            ?>
                    <div class="row text-center align-items-center" style="border-bottom: solid 1px rgb(18, 168, 255);">
                        <div class="col-md-5">
                            <p class="fw-bold text-white"><?php echo $preguntaTF; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="fw-bold text-white"><?php echo $respuestaCorrectaTF; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="fw-bold text-white"><?php echo $respuestaIncorrectaTF; ?></p>
                        </div>
                        <div class="col-md-1">
                            <form method="post">
                                <input type="hidden" name="idPregTF" value="<?php echo $idPreguntaTF; ?>">
                                <input type="hidden" name="idTemaTF" value="<?php echo $idTemaTF; ?>">
                                <button class="btn btn-warning my-2" type="submit" name="editarPregTF">Editar</button>
                                <button class="btn btn-danger my-2" type="submit" name="borrarPregTF">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h2 class="titulo text-center my-5">No hay preguntas verdadero / falso</h2>
            <?php
            }
            ?>
            <form action="crearPregTF.php">
                <input type="hidden" name="idTM" value="<?php echo $idTemaM; ?>">
                <button class="btn btn-primary d-block mx-auto my-5" style="max-width: 150px;" type="submit">Añadir pregunta</button>
            </form>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="customAlertModal" tabindex="-1" aria-labelledby="customAlertModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customAlertModalLabel">Aviso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="recargarPagina()"></button>
                    </div>
                    <div class="modal-body">
                        <p id="customAlertMessage">Este es un mensaje de alerta personalizado.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="recargarPagina()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require($ruta .  'layouts/footer.php');
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>

    <script>
        <?php if (($eliminarM && $eliminarME) or ($eliminarTF && $eliminarTFE)) : ?>
            document.getElementById("customAlertMessage").innerText = "Se ha eliminado la pregunta";
            document.addEventListener('DOMContentLoaded', function() {
                var customAlertModal = new bootstrap.Modal(document.getElementById('customAlertModal'));
                customAlertModal.show();
            });
        <?php else : ?>
            document.getElementById("customAlertMessage").innerText = "Error al eliminar la pregunta";
            document.addEventListener('DOMContentLoaded', function() {
                var customAlertModal = new bootstrap.Modal(document.getElementById('customAlertModal'));
                customAlertModal.show();
            });
        <?php endif; ?>

        function recargarPagina() {
            window.location.href = window.location.href;
        }
    </script>
<?php
} else {
    header('Location: ../index.php');
    exit();
}
?>