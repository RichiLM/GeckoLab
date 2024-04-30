<nav class="navbar navbar-expand-lg" style="background-color: black;">
    <div class="container-fluid" style="background-color: black;">
        <a href="<?php echo $ruta . 'index.php'; ?>">
            <img class="img-fluid mx-3" src="<?php echo $ruta . 'assets/Logos/logo.png'; ?>" alt="logo" width="50px">
        </a>
        <a class="navbar-brand" style="color: rgb(18, 168, 255); font-size: 27px;" href="<?php echo $ruta . 'index.php'; ?>">GECKO-LAB</a>
        <button class="navbar-toggler" style="background-color: rgb(18, 168, 255);" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white; font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/productos.php'; ?>">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white; font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/carrito.php'; ?>">Avance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white; font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/nosotros.php'; ?>">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <!--<button class="nav-link active" style="color: rgb(18, 168, 255); font-size: 22px;" aria-current="page" data-bs-toggle="modal" data-bs-target="#modalIniciarSesion">Perfil</button>-->
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <a class="nav-link active" style="color: rgb(18, 168, 255); font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/Perfil.php'; ?>">Perfil</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link active" style="color: rgb(18, 168, 255); font-size: 22px;" aria-current="page" href="<?php echo $ruta . 'components/CrearCuenta.php'; ?>">Perfil</a>
                    <?php
                    }
                    ?>

                </li>
                <li>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <form action="<?php echo $ruta . 'components/cerrarSesion.php'; ?>">
                            <input class="btn btn-outline-danger" style="font-size: 20px;" type="submit" name="cerrarS" value="Cerrar Sesión">
                        </form>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr style="color: rgb(18, 168, 255); margin: 0;">