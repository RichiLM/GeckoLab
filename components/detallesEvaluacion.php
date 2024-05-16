<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();
require 'conexion.php';
$conexion = conexion();

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
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php require($ruta . 'layouts/nav.php'); ?>

        <div class="container">
            <h1 class="titulo text-center mt-5">Mis resultados</h1>
            <div class="container-fluid" style="border: solid 1px rgb(18, 168, 255); border-radius: 5px;">
                <h2 class="titulo text-center my-3">Resultados del tema X</h2>
                <div class="m-3">
                    <h3 class="titulo">Preguntas opción multiple</h3>
                    <div class="row text-center fw-bold" style="font-size: 20px; color: rgb(18, 168, 255);">
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
                    <div class="row text-center text-white" style="font-size: 20px;">
                        <div class="col-md-8">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, culpa?</p>
                        </div>
                        <div class="col-md-2">
                            <p>Respuesta</p>
                        </div>
                        <div class="col-md-2">
                            <p>Puntaje</p>
                        </div>
                    </div>
                </div> <!-- Preguntas opción multiple -->
                <div class="m-3">
                    <h3 class="titulo mt-5">Preguntas verdadero/falso</h3>
                    <div class="row text-center fw-bold" style="font-size: 20px; color: rgb(18, 168, 255);">
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
                    <div class="row text-center text-white" style="font-size: 20px;">
                        <div class="col-md-8">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, culpa?</p>
                        </div>
                        <div class="col-md-2">
                            <p>Respuesta</p>
                        </div>
                        <div class="col-md-2">
                            <p>Puntaje</p>
                        </div>
                    </div>
                </div><!-- Preguntas verdadero/falso -->
                <div class="m-3">
                    <h3 class="titulo mt-5 mb-3">Resumen</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Errores: </span>10</p>
                            <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Aciertos: </span>10</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Preguntas totales: </span>10</p>
                            <p class="text-white" style="font-size: 20px;"><span class="titulo fw-bold">Calificación: </span>10</p>
                        </div>
                    </div>
                </div><!-- Preguntas verdadero/falso -->
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