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

$verCurso = "SELECT * FROM calificacion WHERE id_tema = 5 AND id_usuario = '$idUsuario'";
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
  <title>Deep Learning</title>
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
        <h2 class="titulo display-1 my-auto">Tema 5: Aprendizaje profundo</h2>
      </div>
    </div>



    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <img class="img-fluid" src="../../assets/progra.jpg" alt="">
      </div>
    </div>

    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">¡Bienvenidos al séptimo tema de nuestro curso de Ciencia de Datos! En esta secciónconoceras el Aprendizaje Profundo o Deep Learning. El aprendizaje profundo es una rama del aprendizaje automático que se basa en redes neuronales artificiales para aprender y realizar tareas complejas, como la visión por computadora, el procesamiento de lenguaje natural y mucho más.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">¿Qué es el Aprendizaje Profundo?</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">El Aprendizaje Profundo se inspira en el funcionamiento del cerebro humano, donde las neuronas están interconectadas en capas para procesar información. De manera similar, en las redes neuronales artificiales, las neuronas artificiales están organizadas en capas, y la información fluye desde la capa de entrada a través de una o más capas ocultas hasta la capa de salida.</p>
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Componentes del Aprendizaje Profundo </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <ul class="list-style-type: square;">
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Redes Neuronales Artificiales: Son la piedra angular del aprendizaje profundo. Estas redes están formadas por unidades llamadas neuronas, que están organizadas en capas. Cada neurona está conectada a las neuronas de la capa anterior y la siguiente, permitiendo la propagación de la información a través de la red.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Capas Ocultas: Estas son las capas intermedias entre la capa de entrada y la capa de salida en una red neuronal. Son responsables de aprender y extraer características complejas de los datos de entrada. Cuantas más capas ocultas tenga una red, más profunda será y más complejas serán las características que puede aprender</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Funciones de Activación: Cada neurona en una red neuronal artificial aplica una función de activación a su entrada para determinar su salida. Las funciones de activación introducen no linealidad en la red, permitiendo que aprenda y represente relaciones complejas en los datos.</li>
        <br>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Algoritmos de Optimización: Estos algoritmos se utilizan para entrenar la red neuronal, es decir, para ajustar los pesos y sesgos de las conexiones entre las neuronas para que la red pueda hacer predicciones precisas. Algunos de los algoritmos de optimización más comunes incluyen el descenso del gradiente estocástico (SGD) y sus variantes, como ADAM y RMSprop.</li>
        <br>
        

      </ul>
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Aplicaciones del Aprendizaje Profundo</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Para trabajar con Aprendizaje Profundo, existen varias bibliotecas populares en Python, como TensorFlow, Keras y PyTorch. Estas bibliotecas proporcionan una interfaz fácil de usar para construir, entrenar y desplegar modelos de aprendizaje profundo.</p>
    </div>
    
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Conclusión</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">En resumen, el Aprendizaje Profundo es una técnica poderosa que ha revolucionado muchos campos en la ciencia de datos. En este tema, exploraremos los fundamentos de las redes neuronales artificiales, las aplicaciones del aprendizaje profundo y cómo implementar modelos utilizando las bibliotecas de Python más populares. Prepárense para sumergirse en un viaje emocionante hacia el corazón de la inteligencia artificial.</p>
    </div>
    <div class="row text-center">
        <div class="col-sm-12">
          <p class="titulo fw-bold" style="font-size: 38px;">Ponte a prueba!</p>
        </div>
        <div class="col-sm-12">
          <p class="text-white" style="font-size: 25px;">Realiza el primer cuestionario de esta unidad para evaluar tu aprendizaje</p>
        </div>
        <div class="col-sm-12">
          <form method="post">
            <input type="hidden" value="6" name="temaN">
            <?php
            $verRes = "SELECT * FROM calificacion WHERE id_tema = 6 AND id_usuario = '$idUsuario'";
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
  header("Location: ../CrearCuenta.php");
  exit;
}
?>