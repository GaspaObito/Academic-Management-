<?php
session_start();
if (empty($_SESSION['Id_Admin']) && empty($_SESSION['Id_usuario'])) {
    echo "<script>location.href='../Login_Users/profesor_y_admin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Academic management</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/Logo.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/Anotaciones.css">
    <script src="../javascript/Navbar_Toggler.js"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="LogoHeader">
                <a href="../index.php">
                    <img src="../Assets/Logo.png" alt="" width="60px" height="60px">
                </a>
                <h2>Academic management</h2>
            </div>
             <div class="navbar-align">
                <button class="navbar-toggler" onclick="toggleMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                        <path stroke="#000000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"
                            d="M4 7h22M4 15h22M4 23h22" />
                    </svg>
                </button>
            </div>
            <ul class="navbar-menu" id="navbarMenu">
                <?php
                if (isset($_SESSION['Id_usuario'])) {
                    echo '
                <a href="../index.php">Inicio</a>
                <a href="../EscanearCodigos.php">Acerca de</a> 
                <a href="../Profesor/anotaciones_busc.php">Observadores</a>';
                    if (isset($_SESSION['Id_Admin'])) {
                        echo '<a href="../Admin/Profesor_busc_Admin.php">Maestros</a>';
                    }
                    echo '<form style="padding-right: 20px;" action="../Config/auth/conectar_RegistroUsuario.php" method="POST">
                <button class="botonAtras" type="submit" name="Cerrar_Login">
                <div class="margen__boton">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="40" height="40" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                            <path d="M1055 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3 -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 28 -21 1526 -21 1498 0 1499 0 1526 21 15 11 37 33 48 48 21 27 21 38 21 486 0 448 0 459 -21 486 -39 53 -71 69 -134 69 -63 0 -95 -16 -134 -69 -20 -26 -21 -42 -24 -377 l-3 -349 -1279 0 -1280 0 0 1920 0 1920 1280 0 1279 0 3 -349 c3 -335 4 -351 24 -377 39 -53 71 -69 134 -69 63 0 95 16 134 69 21 27 21 38 21 486 0 448 0 459 -21 486 -11 15 -33 37 -48 48 -27 21 -30 21 -1514 23 -1221 2 -1492 0 -1517 -11z" />
                            <path d="M3140 3349 c-30 -12 -705 -683 -726 -721 -18 -35 -18 -101 0 -136 8 -15 171 -183 363 -374 376 -375 370 -370 460 -353 49 9 109 69 118 118 16 85 9 96 -208 314 l-201 203 876 2 c868 3 877 3 904 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -36 21 -904 24 l-876 2 201 203 c216 217 224 229 209 312 -17 91 -127 149 -216 114z" />
                        </g>
                    </svg>
                </div>
            </div>
            </button>
            </form>';
                } else {
                    echo '<a href="../index.php">Inicio</a>
                <a href="../EscanearCodigos.php">Acerca de</a>
                <a href="../Login_Users/acudiente.php">Estudiante</a>
                <a href="../Login_Users/profesor_y_admin.php">Profesor</a>';
                }
                ?>
            </ul>
        </nav>
    </header>