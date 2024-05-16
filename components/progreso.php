<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();
require 'conexion.php';
$conexion = conexion();

if (isset($_SESSION["usuario"])) {
    $nombreUsuario = $_SESSION["usuario"];
    $traerIdUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
    $queryUsuario = mysqli_query($conexion, $traerIdUsuario);
    $datosUsuario = mysqli_fetch_assoc($queryUsuario);
    $idUsuario = $datosUsuario["id"];

    $traerCal = "SELECT * FROM calificacion JOIN tema ON calificacion.id_tema = tema.id_tema WHERE id_usuario = '$idUsuario'";
    $queryCal = mysqli_query($conexion, $traerCal);
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
                <h2 class="titulo text-center my-3">Resultados generales</h2>
                <div class="row p-3">
                    <?php
                    if (mysqli_num_rows($queryCal) > 0) {
                        while ($fetchCal = mysqli_fetch_assoc($queryCal)) {
                            $idTema = $fetchCal["id_tema"];
                            $nombreTema = $fetchCal["nombre_tema"];
                            $calificacion = $fetchCal["puntuacion"];
                            $fecha = $fetchCal["fecha"];

                            $traerPreguntasM = "SELECT * FROM evaluacion_multiple WHERE id_tema = '$idTema' AND id_usuario = '$idUsuario'";
                            $queryPreguntasM = mysqli_query($conexion, $traerPreguntasM);

                            $traerPreguntasTF = "SELECT * FROM evaluacion_verdadero_fal WHERE id_tema = '$idTema' AND id_usuario = '$idUsuario'";
                            $queryPreguntasTF = mysqli_query($conexion, $traerPreguntasTF);

                            $cantidadPreguntas = mysqli_num_rows($queryPreguntasM) + mysqli_num_rows($queryPreguntasTF);
                    ?>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="../assets/Logos/ds.jpg" alt="Curso">
                                        <h4 class="titulo fw-bold text-center"><?php echo $nombreTema; ?></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Preguntas: </span><?php echo $cantidadPreguntas; ?></p>
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
                                        <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Fecha: </span><?php echo $fecha; ?></p>
                                        <form action="detallesEvaluacion.php" method="get">
                                            <input type="hidden" name="id_curso" value="<?php echo $idTema; ?>">
                                            <button class="btn fw-bold mx-auto" style="background-color: rgb(18, 168, 255); color: #000; font-size: 20px;" type="submit">Ver detalles</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- .curso -->
                    <?php
                        }
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
    header('Location: CrearCuenta.php');
    exit();
}
?>