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

$verCurso = "SELECT * FROM calificacion WHERE id_tema = 4 AND id_usuario = '$idUsuario'";
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
  <title>Machine Learning</title>
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
        <h2 class="titulo display-1 my-auto">Tema 5: Aprendizaje Automático</h2>
      </div>
    </div>



    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <img class="img-fluid" src="../../assets/progra.jpg" alt="">
      </div>
    </div>

    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">Bienvenidos al tema 5 de nuestro curso de Ciencia de Datos. En esta sección, nos adentraremos en el fascinante mundo del Aprendizaje Automático, una rama de la inteligencia artificial que permite a las máquinas aprender patrones a partir de datos y tomar decisiones sin intervención humana explícita.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Conceptos Básicos</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">El Aprendizaje Automático se divide principalmente en dos categorías: aprendizaje supervisado y no supervisado. En el aprendizaje supervisado, el algoritmo se entrena utilizando un conjunto de datos etiquetados, mientras que en el aprendizaje no supervisado, el algoritmo trabaja con datos no etiquetados para encontrar patrones o estructuras ocultas.</p>
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Algoritmos de Clasificación y Regresión</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Dentro del aprendizaje supervisado, los algoritmos de clasificación se utilizan para predecir la pertenencia a una categoría o clase, mientras que los algoritmos de regresión se utilizan para predecir valores numéricos continuos. Ejemplos de algoritmos de clasificación incluyen la regresión logística, árboles de decisión y máquinas de vectores de soporte, mientras que la regresión lineal y la regresión polinómica son ejemplos de algoritmos de regresión.</p>
      
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Evaluación de Modelos</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Una parte fundamental del proceso de aprendizaje automático es la evaluación de los modelos. Esto implica dividir los datos en conjuntos de entrenamiento y prueba, entrenar el modelo en el conjunto de entrenamiento y evaluar su rendimiento en el conjunto de prueba utilizando métricas adecuadas como precisión, recall, F1-score, o el error cuadrático medio, dependiendo del tipo de problema y algoritmo utilizado.</p>
      
    </div>
    
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Selección de Características</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">La selección de características es otro aspecto importante del aprendizaje automático, que implica identificar las características más relevantes o significativas para el modelo. Esto puede ayudar a mejorar el rendimiento del modelo, reducir la complejidad y el tiempo de entrenamiento, y evitar el sobreajuste.</p>
      
    </div>
    
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Aplicaciones del Aprendizaje Automático</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">El aprendizaje automático tiene una amplia gama de aplicaciones en diversas industrias y sectores, como la medicina, finanzas, comercio electrónico, marketing, y más. Se utiliza para la detección de fraudes, diagnóstico médico, recomendación de productos, análisis de sentimientos en redes sociales, entre otros</p>
      
    </div>
    
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Conclusión</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">En resumen, el Aprendizaje Automático es una poderosa herramienta que permite a las máquinas aprender de los datos y realizar tareas complejas sin una programación explícita. En este tema, hemos explorado los conceptos básicos, los algoritmos principales, la evaluación de modelos, la selección de características y las aplicaciones del aprendizaje automático en el mundo real. En las próximas secciones, profundizaremos en casos de estudio y ejemplos prácticos para consolidar estos conceptos y habilidades.</p>
      
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
            <input type="hidden" value="5" name="temaN">
            <?php
            $verRes = "SELECT * FROM calificacion WHERE id_tema = 5 AND id_usuario = '$idUsuario'";
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




  <!-- Modal -->
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