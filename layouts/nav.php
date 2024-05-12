<nav class="navbar navbar-expand-lg" style="background-color: black;">
    <div class="container-fluid" style="background-color: black;">
        <a href="<?php echo $ruta . 'index.php'; ?>">
            <img class="img-fluid mx-3" src="<?php echo $ruta . 'assets/Logos/icono1.png'; ?>" alt="logo" width="50px">
        </a>
        <a class="navbar-brand" style="color: rgb(18, 168, 255); font-size: 27px;" href="<?php echo $ruta . 'index.php'; ?>">GECKO-LAB</a>
        <button class="navbar-toggler" style="background-color: rgb(18, 168, 255);" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white; font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/curso.php'; ?>">Curso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white; font-size: 22px;" aria-current="page" href="<?php echo $ruta . '#'; ?>">Avance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white; font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/nosotros.php'; ?>">Sobre Nosotros</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(18, 168, 255); font-size: 22px;">
                        Perfil
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                        ?>
                            <li><a class="dropdown-item" aria-current="page" href="<?php echo $ruta . 'components/Perfil.php'; ?>">Mi perfil</a></li>
                        <?php
                        } else {
                        ?>
                            <li><a class="dropdown-item" aria-current="page" href="<?php echo $ruta . 'components/crearCuenta.php'; ?>">Mi perfil</a></li>
                        <?php
                        }
                        ?>
                        <li><a class="dropdown-item" aria-current="page" href="<?php echo $ruta . 'components/historial.php'; ?>">Mi progreso</a></li>
                        <?php
                        if (isset($_SESSION['usuario'])) {
                        ?>
                            <li><a class="dropdown-item" aria-current="page" href="<?php echo $ruta . 'components/cerrarSesion.php'; ?>">Cerrar sesión</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr style="color: rgb(18, 168, 255); margin: 0;">