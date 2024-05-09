<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../../';
session_start();

if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fundamentos</title>
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
        <h2 class="titulo display-1 my-auto">Tema 2: Fundamentos de Programación</h2>
      </div>
    </div>



    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <img src="../../assets/progra.jpg" alt="">
      </div>
    </div>

    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">¡Bienvenidos al segundo tema de nuestro curso de Ciencia de Datos! En esta sección, exploraremos cómo manipular datos utilizando Python, una herramienta fundamental en el arsenal de cualquier científico de datos. La manipulación de datos es el proceso de preparar y organizar los datos para su posterior análisis. A lo largo de este tema, aprenderemos a utilizar bibliotecas de Python como NumPy y Pandas para llevar a cabo esta tarea de manera eficiente y efectiva.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Introducción a Python para Ciencia de Datos </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Antes de sumergirnos en el código, es importante comprender qué significa manipular datos. En pocas palabras, implica realizar diversas operaciones para limpiar, transformar y estructurar los datos de manera que sean adecuados para su análisis. Esto puede incluir la eliminación de datos faltantes, la combinación de conjuntos de datos, la creación de nuevas variables y mucho más.</p>
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Bibliotecas de Python y Manipulación de Datos </p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">En este curso, nos centraremos en dos bibliotecas principales de Python para manipulación de datos: NumPy y Pandas.</p>
      <ul class="list-style-type: square;">
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">NumPy: NumPy es la biblioteca fundamental para la computación numérica en Python. Nos proporciona estructuras de datos como arrays multidimensionales y una amplia gama de funciones para operar con estos arrays de manera eficiente.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Pandas: Pandas es una biblioteca de alto nivel que se basa en NumPy y proporciona estructuras de datos de alto nivel y herramientas para el análisis de datos. En particular, nos permite trabajar con datos tabulares de manera intuitiva, similar a como lo haríamos en una hoja de cálculo.</li>

      </ul>
    </div>

    <div class="row mx-3 mb-3">
      <div class="col-md-6 d-flex ">
        <p class="my-auto justify-text text-start titulo" style="font-size: 30px; ">Manipulación de Datos con Pandas</p>
      </div>
      <div class="col-md-6">

      </div>
    </div>


    <div class="row mx-3 mb-5">
      <p class="my-auto justify-text text-white" style="font-size: 25px;">Una vez que tengamos instaladas las bibliotecas necesarias, comenzaremos a explorar cómo podemos utilizar Pandas para manipular datos. Algunas de las operaciones comunes que aprenderemos a realizar incluyen:</p>
      <ul class="list-style-type: square;">
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Lectura y Escritura de Datos: Pandas nos permite leer datos desde una variedad de fuentes, como archivos CSV, Excel, bases de datos SQL, e incluso desde la web. También nos permite escribir datos en estos formatos.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Limpieza de Datos: Uno de los pasos más importantes en la manipulación de datos es la limpieza, donde identificamos y tratamos los datos faltantes, erróneos o duplicados para asegurarnos de que nuestros datos sean precisos y confiables.</li>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Indexación y Selección: Pandas nos proporciona potentes herramientas para seleccionar subconjuntos de datos basados en criterios específicos, como etiquetas de filas y columnas, valores condicionales, o mediante el uso de índices y etiquetas.</li>
        <br>
        <br>
        <li class="Cuerpo-texto text-white" style="font-size: 25px;">Transformación de Datos: Podemos realizar una variedad de transformaciones en nuestros datos, como agregar nuevas columnas, aplicar funciones a columnas existentes, o cambiar el formato de los datos para que se ajusten a nuestras necesidades.</li>
        <br>

      </ul>
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
  header("Location: ../CrearCuenta.php");
  exit;
}
?>