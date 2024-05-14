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

$verCurso = "SELECT * FROM calificacion WHERE id_tema = 1 AND id_usuario = '$idUsuario'";
$ejectCurso = mysqli_query($conexion, $verCurso);

if (isset($_SESSION["usuario"])) {
?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduccion Ciencia de datos</title>
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
          <h2 class="titulo display-1 my-auto">Tema 1: Introducción a la Ciencia de Datos</h2>
        </div>
      </div>
      <div class="row text-center mx-3 mt-5 mb-5">
        <div class="col-sm">
          <img class="img-fluid" src="../../assets/cd.avif" alt="">
        </div>
      </div>

      <div class="row text-center mx-3 mt-5 mb-5">
        <div class="col-sm">
          <p class="titulo display-1 my-auto" style="font-size: 40px;">¡Bienvenidos al fascinante mundo de la ciencia de datos! En esta primera lección, exploraremos qué es exactamente la ciencia de datos y por qué es tan importante en la actualidad.</p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mx-3 mb-3">
        <div class="col-md-6 d-flex ">
          <p class="my-auto text-start titulo" style="font-size: 25px; ">¿Qué es la Ciencia de Datos? </p>
        </div>
        <div class="col-md-6">

        </div>
      </div>


      <div class="row mx-3 mb-5">
        <p class="my-auto text-white" style="font-size: 25px;">En un mundo cada vez más impulsado por la información, la capacidad de extraer conocimiento significativo de conjuntos de datos complejos es una habilidad fundamental en una amplia gama de campos y sectores. En nuestra plataforma educativa de Ciencia de Datos, nos complace ofrecer un curso completo diseñado para proporcionar a los estudiantes las habilidades y el conocimiento necesarios para sobresalir en este emocionante campo interdisciplinario.</p>
      </div>

      <div class="row mx-3 mb-3">
        <div class="col-md-6 d-flex ">
          <p class="my-auto text-start titulo" style="font-size: 25px; ">Objetivos de la Ciencia de Datos </p>
        </div>
        <div class="col-md-6">

        </div>
      </div>


      <div class="row mx-3 mb-5">
        <p class="my-auto text-white" style="font-size: 25px;">El principal objetivo de la ciencia de datos es descubrir patrones, tendencias y relaciones dentro de los datos que puedan utilizarse para tomar decisiones informadas. Esto incluye desde predicciones sobre el comportamiento futuro hasta identificar oportunidades de mejora en procesos existentes.</p>
      </div>

      <div class="row mx-3 mb-3">
        <div class="col-md-6 d-flex ">
          <p class="my-auto text-start titulo" style="font-size: 25px; ">Importancia de la Ciencia de Datos</p>
        </div>
        <div class="col-md-6">

        </div>
      </div>


      <div class="row mx-3 mb-5">
        <p class="my-auto text-white" style="font-size: 25px;">En la era digital en la que vivimos, estamos rodeados de datos generados constantemente por diversas fuentes, como redes sociales, sensores, transacciones comerciales y más. La capacidad para analizar y comprender estos datos se ha vuelto crucial para empresas, instituciones académicas, organizaciones sin fines de lucro e incluso gobiernos. La ciencia de datos proporciona las herramientas necesarias para aprovechar al máximo este vasto océano de información.</p>
      </div>

      <div class="row mx-3 mb-3">
        <div class="col-md-6 d-flex ">
          <p class="my-auto text-start  titulo" style="font-size: 25px; ">Historia y Evolución</p>
        </div>
        <div class="col-md-6">

        </div>
      </div>


      <div class="row mx-3 mb-5">
        <p class="my-auto text-white" style="font-size: 25px;">Aunque el término "ciencia de datos" puede sonar moderno, sus raíces se remontan a décadas atrás. Surgió de la intersección entre la estadística, la informática y la teoría de la información en los años 60 y 70. Desde entonces, ha experimentado un crecimiento exponencial, especialmente con los avances en tecnología de la información y la explosión de datos digitales en los últimos años.</p>
      </div>

      <div class="row mx-3 mb-3">
        <div class="col-md-6 d-flex ">
          <p class="my-auto text-start titulo" style="font-size: 25px; ">Conclusiones</p>
        </div>
        <div class="col-md-6">

        </div>
      </div>


      <div class="row mx-3 mb-5">
        <p class="titumy-auto text-white" style="font-size: 25px;">En resumen, la ciencia de datos es un campo emocionante y en constante evolución que ofrece enormes oportunidades para aquellos que estén dispuestos a sumergirse en él. En este curso, exploraremos desde los conceptos básicos hasta técnicas avanzadas para ayudarte a dominar esta disciplina y convertirte en un experto en el análisis y la interpretación de datos.</p>
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
            <input type="hidden" value="1" name="temaN">
            <?php
            if (mysqli_num_rows($ejectCurso) > 0) {
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

    <!-- Modal -->

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