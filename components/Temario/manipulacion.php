<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../../';
session_start();

if (isset($_POST["test"])) {
  $_SESSION["tema"] = $_POST["temaN"];
  header('Location: ../Evaluacion/test.php');
  exit();
}

require '../conexion.php';
$conexion = conexion();

$nombreUsuario = $_SESSION["usuario"];
$traerIdUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
$queryUsuario = mysqli_query($conexion, $traerIdUsuario);
$datosUsuario = mysqli_fetch_assoc($queryUsuario);
$idUsuario = $datosUsuario["id"];

$verCurso = "SELECT * FROM calificacion WHERE id_tema = 2 AND id_usuario = '$idUsuario'";
$ejectCurso = mysqli_query($conexion, $verCurso);
$cal;
if (mysqli_num_rows($ejectCurso) > 0) {
  $fetchCurso = mysqli_fetch_assoc($ejectCurso);
  $cal = $fetchCurso["puntuacion"];
}

if(isset($_SESSION["usuario"]) && mysqli_num_rows($ejectCurso) > 0 && !$cal < 6){
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ciencia de Datos</title>
  <link rel="icon" href="<?php echo $ruta . 'assets/Logos/icono1.png'; ?>" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $ruta . 'css/style.css'; ?>">
</head>

<body>
  <?php require($ruta . 'layouts/nav.php'); ?>


  <div class="container">
    <div class="row  text-center  mt-5 mb-5">
      <div class="col-sm">
        <h2 class="titulo display-1 my-auto">Tema 3: Manipulación de Datos</h2>
      </div>
    </div>



    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <img class="img-fluid" src="<?php echo $ruta . 'assets/mani.jfif'; ?>" alt="Manipulación de Datos">
      </div>
    </div>

    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">Bienvenidos al tercer tema de nuestro curso de Ciencia de Datos: la Manipulación de Datos. En este módulo, aprenderemos cómo trabajar con conjuntos de datos de manera efectiva utilizando Python y sus bibliotecas especializadas.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Introducción a la Manipulación de Datos </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">La manipulación de datos es una parte fundamental en el proceso de análisis y modelado de datos. Antes de poder realizar cualquier análisis significativo, necesitamos asegurarnos de que nuestros datos estén limpios, estructurados y listos para su procesamiento. En este curso, exploraremos cómo realizar tareas como la carga de datos, la limpieza y el preprocesamiento, utilizando herramientas como Pandas, una de las bibliotecas más populares de Python para manipulación de datos.</p>
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Carga y Escritura de Datos </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">El primer paso para trabajar con datos es cargarlos en nuestro entorno de trabajo. Aprenderemos cómo cargar datos desde diferentes fuentes, como archivos CSV, Excel, JSON y bases de datos, utilizando las funciones proporcionadas por Pandas. Además, exploraremos cómo escribir datos procesados de vuelta a diferentes formatos para su posterior uso o distribución.</p>

    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Limpieza y Preprocesamiento de Datos</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Los datos del mundo real suelen ser imperfectos y pueden contener errores, valores faltantes o duplicados. En este curso, aprenderemos técnicas para limpiar y preprocesar nuestros datos, incluyendo la eliminación de valores atípicos, la imputación de valores faltantes y la normalización de datos para asegurar su calidad y coherencia.</p>
    </div>
    <div class="row text-center">
        <div class="col-sm-12">
          <p class="titulo fw-bold" style="font-size: 38px;">Ponte a prueba!</p>
        </div>
        <div class="col-sm-12">
          <p class="text-white" style="font-size: 25px;">Realiza el cuestionario de esta unidad para evaluar tu aprendizaje</p>
        </div>
        <div class="col-sm-12">
          <form method="post">
            <input type="hidden" value="3" name="temaN">
            <?php
            $verRes = "SELECT * FROM calificacion WHERE id_tema = 3 AND id_usuario = '$idUsuario'";
            $ResCurso = mysqli_query($conexion, $verRes);

            if (mysqli_num_rows($ResCurso) > 0) {
            ?>
              <button class="btn fw-bold mt-3" style="background-color: rgb(18, 168, 255); color: #000; font-size: 20px;" name="test">Reintentar Test</button>
            <?php
            } else {
              ?>
              <button class="btn fw-bold mt-3" style="background-color: rgb(18, 168, 255); color: #000; font-size: 20px;" name="test">Contestar Test</button>
            <?php
            }
            ?>
          </form>
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
  header("Location: ../../index.php");
  exit;
}
?>