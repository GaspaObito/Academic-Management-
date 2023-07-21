<!DOCTYPE html>
<html lang="en">
<head>
    <title>Academic management</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/Logo.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/Inicio_Index.css">
    <script src="javascript/Navbar_Toggler.js"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="LogoHeader">
                <a href="index.php">
                    <img src="Assets/Logo.png" alt="" width="60px" height="60px">
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
                session_start();
                if (isset($_SESSION['Id_Estudiante']) || isset($_SESSION['Id_Profe'])) { ?>
                    <a href="index.php">Inicio</a>
                    <a href="EscanearCodigos.php">Acerca de</a>
                    <?php if (isset($_SESSION['Id_Profe'])) { ?>
                    <a href="Profesor/anotaciones_busc.php">Observadores</a>
                    <?php } ?>
                    <?php if (isset($_SESSION['Id_Admin'])) { ?>
                        <a href="Admin/Profesor_busc_Admin.php">Maestros</a>
                    <?php } ?>
                    <form action="Config/auth/conectar_RegistroUsuario.php" method="POST">
                        <button class="botonAtras" type="submit" name="Cerrar_Login">
                            <div class="margen__boton">
                                <svg class="navbar-icon" style="margin:0">
                                    <use xlink:href="Assets/Svg/Logout.svg#Logout-icon">
                                </svg>    
                            </div>
                            </div>
                        </button>
                    </form>
                <?php } else { ?>
                    <a href="index.php">Inicio</a>
                    <a href="EscanearCodigos.php">Acerca de</a>
                    <a href="Login_Users/acudiente.php">Estudiante</a>
                    <a href="Login_Users/profesor_y_admin.php">Profesor</a>
                <?php } ?>
            </ul>
        </nav>
    </header>