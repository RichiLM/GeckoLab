<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();

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

  <div class="container-fluid">
    <h2 class="titulo display-1 my-auto text-center mt-5 mb-5">Temario</h2>

    <div class="accordion justify-content-center" id="accordionPanelsStayOpenExample">
        <!-- Primer título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingUno">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseUno" aria-expanded="true" aria-controls="panelsStayOpen-collapseUno">
                    Introducción a la Ciencia de Datos
                </button>
            </h2>
            <div id="panelsStayOpen-collapseUno" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingUno">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Definición y objetivos de la ciencia de datos.</li>
                        <br>
                        <li class="Cuerpo-texto">Importancia en diversos campos y sectores.</li>
                        <br>
                        <li class="Cuerpo-texto">Historia y evolución de la ciencia de datos.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Segundo título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingDos">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDos" aria-expanded="true" aria-controls="panelsStayOpen-collapseDos">
                    Fundamentos de Programación
                </button>
            </h2>
            <div id="panelsStayOpen-collapseDos" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingDos">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Introducción a Python para ciencia de datos.</li>
                        <br>
                        <li class="Cuerpo-texto">Estructuras de datos y control de flujo.</li>
                        <br>
                        <li class="Cuerpo-texto">Funciones y módulos en Python.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tercer título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTres">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTres" aria-expanded="true" aria-controls="panelsStayOpen-collapseTres">
                    Manipulación de Datos
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTres" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTres">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Bibliotecas de Python para manipulación de datos (NumPy, Pandas).</li>
                        <br>
                        <li class="Cuerpo-texto">Lectura y escritura de datos en diferentes formatos.</li>
                        <br>
                        <li class="Cuerpo-texto">Limpieza y preprocesamiento de datos.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Cuarto título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingCuatro">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseCuatro" aria-expanded="true" aria-controls="panelsStayOpen-collapseCuatro">
                    Visualización de Datos
                </button>
            </h2>
            <div id="panelsStayOpen-collapseCuatro" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingCuatro">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Tipos de gráficos y su uso en visualización de datos.</li>
                        <br>
                        <li class="Cuerpo-texto">Librerías populares de visualización en Python (Matplotlib, Seaborn).</li>
                        <br>
                        <li class="Cuerpo-texto">Personalización y diseño de gráficos.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quinto título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingCinco">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseCinco" aria-expanded="true" aria-controls="panelsStayOpen-collapseCinco">
                    Estadística Descriptiva
                </button>
            </h2>
            <div id="panelsStayOpen-collapseCinco" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingCinco">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Medidas de tendencia central y dispersión.</li>
                        <br>
                        <li class="Cuerpo-texto">Análisis exploratorio de datos.</li>
                        <br>
                        <li class="Cuerpo-texto">Correlación y covarianza.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sexto título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingSeis">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeis" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeis">
                    Aprendizaje Automático (Machine Learning)
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSeis" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeis">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Conceptos básicos de aprendizaje supervisado y no supervisado.</li>
                        <br>
                        <li class="Cuerpo-texto">Algoritmos de clasificación y regresión.</li>
                        <br>
                        <li class="Cuerpo-texto">Evaluación de modelos y selección de características.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Séptimo título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingSiete">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSiete" aria-expanded="true" aria-controls="panelsStayOpen-collapseSiete">
                    Aprendizaje Profundo (Deep Learning)
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSiete" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSiete">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Introducción a las redes neuronales artificiales.</li>
                        <br>
                        <li class="Cuerpo-texto">Bibliotecas de Deep Learning (TensorFlow, Keras, PyTorch).</li>
                        <br>
                        <li class="Cuerpo-texto">Aplicaciones de Deep Learning en visión por computadora, procesamiento de lenguaje natural, y más.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Octavo título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOcho">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOcho" aria-expanded="true" aria-controls="panelsStayOpen-collapseOcho">
                    Proyecto Final
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOcho" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOcho">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Desarrollo de un proyecto de ciencia de datos desde la adquisición de datos hasta la implementación del modelo.</li>
                        <br>
                        <li class="Cuerpo-texto">Presentación de resultados y conclusiones.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Noveno título -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingNueve">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNueve" aria-expanded="true" aria-controls="panelsStayOpen-collapseNueve">
                    Ética y Privacidad en Ciencia de Datos
                </button>
            </h2>
            <div id="panelsStayOpen-collapseNueve" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNueve">
                <div class="accordion-body Cuerpo-texto">
                    <ul class="list-style-type: square;">
                        <li class="Cuerpo-texto">Consideraciones éticas en la recopilación y uso de datos.</li>
                        <br>
                        <li class="Cuerpo-texto">Protección de la privacidad de los usuarios.</li>
                        <br>
                        <li class="Cuerpo-texto">Responsabilidad y transparencia en la toma de decisiones basada en datos.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


  
  

  <?php require($ruta . 'layouts/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
