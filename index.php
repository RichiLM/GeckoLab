<?php
// Esto es para que cargue las rutas del nav antes de abrir la pagina
$ruta = '';
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
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php require($ruta . 'layouts/nav.php'); ?>

  <div class="container-fluid" >
    <div class="row  text-center  mt-5 mb-5" >
      <div class="col-sm">
        <h3 class="text-white display-1 my-auto">Curso en</h3>
        <h2 class="titulo display-1 my-auto">CIENCIA DE DATOS</h2>
      </div>
    </div>

   <div class="row  text-center " >
      <div class="col-sm">
        <img src="assets/cd.avif" alt="">
      </div>
    </div>
    
    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">Bienvenido a nuestra Plataforma Educativa de Ciencia de Datos</p>
      </div>
    </div>

    <div class="row mx-3 mb-5">
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <p class="my-auto justify-text text-white" style="font-size: 25px;">En un mundo cada vez más impulsado por la información, la capacidad de extraer conocimiento significativo de conjuntos de datos complejos es una habilidad fundamental en una amplia gama de campos y sectores. En nuestra plataforma educativa de Ciencia de Datos, nos complace ofrecer un curso completo diseñado para proporcionar a los estudiantes las habilidades y el conocimiento necesarios para sobresalir en este emocionante campo interdisciplinario.</p>
      </div>
      <div class="col-md-6">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/Logos/ds.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/Logos/ds1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/Logos/ds3.jpeg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 40px;">La Importancia de la Ciencia de Datos en el Siglo XXI</p>
      </div>
    </div>
    
    <div class="row mx-3 mb-5">
      
      <div class="col-md-6 align-items-center justify-content-center">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/me.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/finanzas.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/tec.jpeg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <p class="my-auto justify-text text-white" style="font-size: 25px;">Desde la medicina hasta las finanzas, desde la tecnología hasta la investigación académica, la ciencia de datos desempeña un papel vital en la toma de decisiones informadas y en la generación de valor a partir de datos brutos. La capacidad de analizar y comprender patrones, tendencias y correlaciones en conjuntos de datos complejos permite a las organizaciones y profesionales abordar desafíos de manera más eficiente, identificar oportunidades de mejora y tomar decisiones estratégicas fundamentadas.</p>
      </div>
    </div>


  <div class="row text-center mx-3 mt-5 mb-5">
      <div class="col-sm">
        <p class="titulo display-1 my-auto" style="font-size: 60px;">¿Qué aprenderas?</p>
      </div>
    </div>

    <div class="row mx-3 mb-5">
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        
        	<ol class="my-auto justify-text text-white" style="font-size: 25px;">
  <li>Introducción a la Ciencia de Datos</li>
  <li>Fundamentos de Programación</li>
  <li>Manipulación de Datos</li>
  <li>Visualización de Datos</li>
  <li>Estadística Descriptiva</li>
  <li>Aprendizaje Automático (Machine Learning)</li>
  <li>Aprendizaje Profundo (Deep Learning)</li>
  <li>Proyecto Final</li>
  <li>Ética y Privacidad en Ciencia de Datos</li>
</ol>
        
      </div>
      <div class="col-md-6">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/tec2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/tec3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/tec4.webp" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>

    
   
   
    
    


    <!-- Modal -->
    <div class="modal fade" id="modalIniciarSesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: #202124;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color: rgb(51, 255, 0);">Iniciar sesion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../php/login.php" method="post">
            <div class="modal-body">
              <div class="form-outline form-white mb-4">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label class="form-label" for="usuario" style="color: white;">Usuario</label>
                <input type="text" style="text-align: center; " name="uname" placeholder="Usuario" class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
                <label class="form-label" for="password" style="color: white;">Contraseña</label>
                <input type="password" style="text-align: center;" name="password" placeholder="Contraseña" class="form-control form-control-lg" />
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-between" style="background-color: black;">
              <p class="small pb-lg-2 me-lg-auto"><a class="text-white-50" href="#!">Olvidaste tu contraseña?</a></p>
              <a href="https://fabulous-frangollo-15319d.netlify.app/" target="_blank">
                <button type="button" class="btn  mx-auto" data-bs-dismiss="modal" style="color:black;">Hola</button>
              </a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" style="background-color:rgb(51, 255, 0); color: black;" type="submit">Iniciar sesión</button>
              <p class="small pb-lg-2 me-lg-auto"><a class="text-white-50" href="#!">Crear cuenta</a></p>
            </div>
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
