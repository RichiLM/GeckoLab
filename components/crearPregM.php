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

if (isset($_SESSION["usuario"]) && $estatusAdmin == 1 && isset($_GET["idTM"])) {
    $idTema = $_GET["idTM"];

    if (isset($_POST["regPregM"])) {
        $pregunta = $_POST["preguntaM"];
        $respuestaC = $_POST["respuestaCorrectaM"];
        $respuestaI1 = $_POST["respuestaIncorrectaM1"];
        $respuestaI2 = $_POST["respuestaIncorrectaM2"];
        $respuestaI3 = $_POST["respuestaIncorrectaM3"];
    
        $traerMaxId = "SELECT MAX(id_pregunta) as max_id FROM pregunta_opmultiple";
        $ejectId = mysqli_query($conexion, $traerMaxId);
    
        $fetchId = mysqli_fetch_assoc($ejectId);
        $maxId = $fetchId["max_id"];
        $nuevoID = $maxId + 1;
    
        $insertarPreg = "INSERT INTO pregunta_opmultiple VALUES ('$nuevoID', '$idTema', '$pregunta', '$respuestaC', '$respuestaI1', '$respuestaI2', '$respuestaI3')";
        $resultInsertM = mysqli_query($conexion, $insertarPreg);
    }
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
            <h1 class="titulo text-center mt-5">Alta de pregunta de opción multiple</h1>
            <?php
            $traerTema = "SELECT * FROM tema WHERE id_tema = '$idTema'";
            $queryTema = mysqli_query($conexion, $traerTema);

            $fetchTema = mysqli_fetch_assoc($queryTema);
            $nombreTema = $fetchTema["nombre_tema"];
            ?>
            <h2 class="titulo text-center mt-4 mb-4">Tema <?php echo $nombreTema; ?></h1>
                <form action="" method="post" style="max-width: 600px;" class="mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgb(18, 168, 255);">Pregunta</span>
                        <input required name="preguntaM" type="text" class="form-control" placeholder="Texto de la pregunta" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgb(18, 168, 255);">Respuesta correcta</span>
                        <input required name="respuestaCorrectaM" type="text" class="form-control" placeholder="Respuesta correcta" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgb(18, 168, 255);">Respuesta incorrecta 1</span>
                        <input required name="respuestaIncorrectaM1" type="text" class="form-control" placeholder="Respuesta incorrecta 1" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgb(18, 168, 255);">Respuesta incorrecta 2</span>
                        <input required name="respuestaIncorrectaM2" type="text" class="form-control" placeholder="Respuesta incorrecta 2" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgb(18, 168, 255);">Respuesta incorrecta 3</span>
                        <input required name="respuestaIncorrectaM3" type="text" class="form-control" placeholder="Respuesta incorrecta 3" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <p class="text-white mt-3" style="font-size: 20px;"><span class="titulo fw-bold">Nota: </span>El sistema alterna el orden de las respuestas, por lo que no importa el orden en el que se ingresen.</p>
                    <button type="submit" name="regPregM" class="btn btn-primary d-block mx-auto my-5" style="max-width: 150px;">Añadir pregunta</button>
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
        <script>
            <?php if ($resultInsertM) : ?>
                document.getElementById("customAlertMessage").innerText = "Se ha registrado la pregunta";
                document.addEventListener('DOMContentLoaded', function() {
                    var customAlertModal = new bootstrap.Modal(document.getElementById('customAlertModal'));
                    customAlertModal.show();
                });
            <?php else : ?>
                document.getElementById("customAlertMessage").innerText = "Error al registrar la pregunta";
                document.addEventListener('DOMContentLoaded', function() {
                    var customAlertModal = new bootstrap.Modal(document.getElementById('customAlertModal'));
                    customAlertModal.show();
                });
            <?php endif; ?>

            function recargarPagina() {
                window.location.href = "admin.php";
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header('Location: ../index.php');
    exit();
}
?>