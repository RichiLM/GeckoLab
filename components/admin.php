<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();
require 'conexion.php';
$conexion = conexion();

$nombreUsuario = $_SESSION["usuario"];
$traerIdUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
$queryUsuario = mysqli_query($conexion, $traerIdUsuario);
$datosUsuario = mysqli_fetch_assoc($queryUsuario);
$idUsuario = $datosUsuario["id"];

$consultarPermiso = "SELECT * FROM admin WHERE id_usuario = '$idUsuario'";
$verAdmin = mysqli_query($conexion, $consultarPermiso);

$fetchAdmin = mysqli_fetch_assoc($verAdmin);
$estatusAdmin = $fetchAdmin["permiso"];

if (isset($_SESSION["usuario"]) && $estatusAdmin == 1) {

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
            <h1 class="titulo text-center mt-5 mb-4">Módulo administrador</h1>
            <?php
            $traerTemas = "SELECT * FROM tema";
            $queryTema = mysqli_query($conexion, $traerTemas);
            $fetchTema = mysqli_fetch_assoc($queryTema);

            $temas = array();
            $numPreg = array();
            $cantTemas = mysqli_num_rows($queryTema);

            for ($i = 0; $i < $cantTemas; $i++) {
                $idTema = $i + 1;

                $traerTemas = "SELECT * FROM tema WHERE id_tema = '$idTema'";
                $queryTema = mysqli_query($conexion, $traerTemas);
                $fetchTema = mysqli_fetch_assoc($queryTema);
                $temas[$i] = $fetchTema["nombre_tema"];

                $preguntasM = "SELECT * FROM pregunta_opmultiple WHERE id_tema = '$idTema'";
                $cantM = mysqli_query($conexion, $preguntasM);

                $preguntasTF = "SELECT * FROM pregunta_verd_fal WHERE id_tema = '$idTema'";
                $cantTF = mysqli_query($conexion, $preguntasTF);

                $numPreg[$i] = mysqli_num_rows($cantM) + mysqli_num_rows($cantTF);
            }
            ?>
            <div class="row">
                <div class="col-md-4 my-3">
                    <div class="card d-block mx-auto text-white text-center h-100" style="width: 18rem; background-color: transparent; border: solid 1px rgb(18, 168, 255);">
                        <img src="../assets/cd.avif" class="card-img-top" alt="Curso">
                        <div class="card-body">
                            <h5 class="card-title titulo fw-bold"><?php echo $temas[0]; ?></h5>
                            <p class="card-text"><strong class="titulo fw-bold">Preguntas: </strong><?php echo $numPreg[0]; ?></p>
                            <form action="preguntasCursos.php" method="get">
                                <input type="hidden" name="nombreTema" value="<?php echo $temas[0]; ?>">
                                <button class="btn fw-bold" style="background-color: rgb(18, 168, 255); color: #000; font-size: 18px;">Ver preguntas</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card d-block mx-auto text-white text-center h-100" style="width: 18rem; background-color: transparent; border: solid 1px rgb(18, 168, 255);">
                        <img src="../assets/progra.jpg" class="card-img-top" alt="Curso">
                        <div class="card-body">
                            <h5 class="card-title titulo fw-bold"><?php echo $temas[1]; ?></h5>
                            <p class="card-text"><strong class="titulo fw-bold">Preguntas: </strong><?php echo $numPreg[1]; ?></p>
                            <form action="preguntasCursos.php" method="get">
                                <input type="hidden" name="nombreTema" value="<?php echo $temas[1]; ?>">
                                <button class="btn fw-bold" style="background-color: rgb(18, 168, 255); color: #000; font-size: 18px;">Ver preguntas</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card d-block mx-auto text-white text-center h-100" style="width: 18rem; background-color: transparent; border: solid 1px rgb(18, 168, 255);">
                        <img src="../assets/mani.jfif" class="card-img-top" alt="Curso">
                        <div class="card-body">
                            <h5 class="card-title titulo fw-bold"><?php echo $temas[2]; ?></h5>
                            <p class="card-text"><strong class="titulo fw-bold">Preguntas: </strong><?php echo $numPreg[2]; ?></p>
                            <form action="preguntasCursos.php" method="get">
                                <input type="hidden" name="nombreTema" value="<?php echo $temas[2]; ?>">
                                <button class="btn fw-bold" style="background-color: rgb(18, 168, 255); color: #000; font-size: 18px;">Ver preguntas</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card d-block mx-auto text-white text-center h-100" style="width: 18rem; background-color: transparent; border: solid 1px rgb(18, 168, 255);">
                        <img src="../assets/visua.jpg" class="card-img-top" alt="Curso">
                        <div class="card-body">
                            <h5 class="card-title titulo fw-bold"><?php echo $temas[3]; ?></h5>
                            <p class="card-text"><strong class="titulo fw-bold">Preguntas: </strong><?php echo $numPreg[3]; ?></p>
                            <form action="preguntasCursos.php" method="get">
                                <input type="hidden" name="nombreTema" value="<?php echo $temas[3]; ?>">
                                <button class="btn fw-bold" style="background-color: rgb(18, 168, 255); color: #000; font-size: 18px;">Ver preguntas</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card d-block mx-auto text-white text-center h-100" style="width: 18rem; background-color: transparent; border: solid 1px rgb(18, 168, 255);">
                        <img src="../assets/tec2.jpg" class="card-img-top" alt="Curso">
                        <div class="card-body">
                            <h5 class="card-title titulo fw-bold"><?php echo $temas[4]; ?></h5>
                            <p class="card-text"><strong class="titulo fw-bold">Preguntas: </strong><?php echo $numPreg[4]; ?></p>
                            <form action="preguntasCursos.php" method="get">
                                <input type="hidden" name="nombreTema" value="<?php echo $temas[4]; ?>">
                                <button class="btn fw-bold" style="background-color: rgb(18, 168, 255); color: #000; font-size: 18px;">Ver preguntas</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card d-block mx-auto text-white text-center h-100" style="width: 18rem; background-color: transparent; border: solid 1px rgb(18, 168, 255);">
                        <img src="../assets/tec.jpeg" class="card-img-top" alt="Curso">
                        <div class="card-body">
                            <h5 class="card-title titulo fw-bold"><?php echo $temas[5]; ?></h5>
                            <p class="card-text"><strong class="titulo fw-bold">Preguntas: </strong><?php echo $numPreg[5]; ?></p>
                            <form action="preguntasCursos.php" method="get">
                                <input type="hidden" name="nombreTema" value="<?php echo $temas[5]; ?>">
                                <button class="btn fw-bold" style="background-color: rgb(18, 168, 255); color: #000; font-size: 18px;">Ver preguntas</button>
                            </form>
                        </div>
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
<?php
} else {
    header('Location: ../index.php');
    exit();
}
?>