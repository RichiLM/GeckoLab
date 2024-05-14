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

$verCurso = "SELECT * FROM calificacion WHERE id_tema = 3 AND id_usuario = '$idUsuario'";
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
  <title>Visualizacion</title>
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
        <h2 class="titulo display-1 my-auto">Tema 4: Visualización de Datos</h2>
      </div>
    </div>



    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <img class="img-fluid" src="<?php echo $ruta . 'assets/visua.jpg'; ?>" alt="Manipulación de Datos">
      </div>
    </div>

    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">¡Bienvenidos al tema 4 de nuestro curso de Ciencia de Datos! En esta sección,aprenderas sobre la visualización de datos, una habilidad fundamental para cualquier científico de datos. La visualización de datos nos permite explorar, entender y comunicar patrones y tendencias en conjuntos de datos de una manera clara y efectiva.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Importancia de la Visualización de Datos </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Es importante comprender por qué la visualización de datos es crucial en el campo de la ciencia de datos. La visualización nos ayuda a:</p>
      
      <ul class="list-style-type: square;">
                <br>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Identificar patrones y relaciones en los datos.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Comunicar hallazgos y conclusiones de manera efectiva.</li>
         <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Facilitar la toma de decisiones basada en datos.</li>
        <br>

        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Explorar y entender mejor los datos antes de aplicar técnicas de modelado.</li>
      </ul>
    </div>
    
    

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Herramientas de Visualización en Python </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">En este curso, nos centraremos en el uso de Python para la visualización de datos. Dos de las bibliotecas más populares para este propósito son Matplotlib y Seaborn. Matplotlib es una biblioteca de trazado 2D que nos permite crear una amplia gama de gráficos, desde simples diagramas de líneas hasta visualizaciones más complejas. Seaborn, por otro lado, se basa en Matplotlib y proporciona una interfaz de alto nivel para crear visualizaciones estadísticas atractivas y informativas.</p>

    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; "> Tipos de Gráficos y su Aplicación</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">En este curso, exploraremos varios tipos de gráficos comunes que se utilizan en la visualización de datos, incluyendo:</p>
      <ul class="list-style-type: square;">
                <br>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Gráficos de dispersión: Un gráfico de dispersión muestra la relación entre dos variables mediante puntos en un plano cartesiano, donde cada punto representa un par de valores de las dos variables. Es útil para identificar patrones o correlaciones entre las variables.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Histogramas: Un histograma es un gráfico de barras que muestra la distribución de una variable numérica mediante la división de sus valores en intervalos y la representación de la frecuencia o densidad de ocurrencia de esos intervalos mediante barras.</li>
         <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Diagramas de caja (boxplots): Un diagrama de caja es una representación gráfica que muestra la distribución de un conjunto de datos a través de sus valores mínimo, máximo, mediana y cuartiles. Es útil para identificar la dispersión y los valores atípicos en los datos.</li>
        <br>

        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Gráficos de barras: Un gráfico de barras es una representación visual de datos categóricos mediante barras rectangulares donde la longitud de cada barra representa la frecuencia o cantidad de cada categoría. Es útil para comparar diferentes categorías entre sí.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Gráficos circulares (pie charts): Un gráfico circular, también conocido como diagrama de sectores o pie chart, muestra la proporción de cada categoría en un conjunto de datos mediante sectores de un círculo, donde el tamaño de cada sector representa la proporción de la categoría en el conjunto de datos total. Es útil para visualizar la distribución relativa de las categorías.</li>
        <br>
      </ul>
      <br>
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Cada tipo de gráfico tiene sus propias aplicaciones y nos permite visualizar diferentes aspectos de los datos, desde la distribución de valores hasta las relaciones entre variables.</p>
    </div>
    
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Personalización y Estilos</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Una de las ventajas de trabajar con Python para la visualización de datos es la capacidad de personalizar nuestros gráficos según nuestras necesidades y preferencias. En este curso, aprenderemos a personalizar colores, estilos de línea, etiquetas de ejes y más para crear visualizaciones que sean claras y estéticamente agradables.</p>

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
            <input type="hidden" value="4" name="temaN">
            <?php
            $verRes = "SELECT * FROM calificacion WHERE id_tema = 4 AND id_usuario = '$idUsuario'";
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