<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '../';
session_start();
require 'conexion.php';
$conexion = conexion();

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
    <div class="row  text-center  mt-5 mb-5">
      <div class="col-sm">

        <h2 class="titulo display-1 my-auto">GECKO-LAB</h2>
      </div>
    </div>

    <div class="row  text-center ">
      <div class="col-sm">
        <img class="img-fluid" src="assets/cd.avif" alt="">
      </div>
    </div>

    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">Una marca de Grumpy Gecko Company</p>
      </div>
    </div>

    <div class="container">

      <div class="container my-5">
        <div class="row">
          <div class="col-md-6">
            <img  src="../assets/Logos/GL%201.png" class="img-fluid" alt="Gecko-Lab Logo">
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div>
              <h2 class="titulo display-1" style="font-size: 60px;">¿Quiénes Somos?</h2>
              <br>
              <p class="justify-text text-white" style="font-size: 25px;">En Gecko-Lab, nos apasiona impulsar el aprendizaje y la innovación en el campo de la ciencia de datos. Somos un equipo diverso de profesionales dedicados, comprometidos a proporcionar una experiencia educativa excepcional a nuestros estudiantes.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="container my-5">
        <div class="row">
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div>
              <h2 class="titulo display-1" style="font-size: 60px;">Nuestra Misión</h2>
              <br>
              <p class="justify-text text-white" style="font-size: 25px;">En Gecko-Lab, nuestra misión es proporcionarte las habilidades y el conocimiento necesarios para prosperar en el campo de la ciencia de datos. Creemos en el poder transformador de los datos y nos esforzamos por capacitar a individuos y organizaciones para que utilicen esta herramienta poderosa de manera efectiva.</p>
            </div>
          </div>
          <div class="col-md-6">
            <img src="../assets/tec2.jpg" class="img-fluid " alt="Gecko-Lab Logo">
          </div>
        </div>
      </div>

      <div class="container my-5">
        <div class="row">
          <div class="col-md-6">
            <img src="../assets/chat.png" class="img-fluid" alt="Gecko-Lab Logo">
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div>
              <h2 class="titulo display-1" style="font-size: 60px;">¿Qué Nos Distingue?</h2>
              <br>
              <p class="justify-text text-white" style="font-size: 25px;">En Gecko-Lab, nos destacamos por nuestra combinación única de experiencia técnica, enfoque práctico y compromiso con la excelencia. Nuestro equipo de expertos en ciencia de datos está dedicado a brindarte una experiencia de aprendizaje enriquecedora y personalizada, diseñada para impulsar tu éxito.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row mx-3 mb-3 justify-content-center">
          <div class="col-md-6">
            <p class="my-auto justify-text text-center titulo" style="font-size: 40px;">Únete a la Comunidad de Gecko-Lab</p>
          </div>
        </div>

        <div class="row mx-3 mb-5">
          <div class="col-md-12">
            <p class="my-auto justify-text text-white" style="font-size: 25px;">Ya sea que estés comenzando tu viaje en la ciencia de datos o buscando llevar tus habilidades al siguiente nivel, te damos la bienvenida a unirte a la comunidad de Gecko-Lab. ¡Juntos, podemos explorar el poder transformador de los datos y hacer un impacto positivo en el mundo!</p>
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