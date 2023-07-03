<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBSERVADOR</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="../css/normalize.css">
    <link href="../css/phone_desc_fecha.css" rel="stylesheet">
</head>
<body>
    <div class="nav__miniventana">
        <a></a>
        <h1 id="TitleStart">ANOTACIONES</h1>
        <div>
            <a href="acudiente.php">
                <div class="botonAtras">
                    <div class="margen__boton">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="40" height="40"
                            viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                                stroke="none">
                                <path
                                    d="M1055 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3 -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 28 -21 1526 -21 1498 0 1499 0 1526 21 15 11 37 33 48 48 21 27 21 38 21 486 0 448 0 459 -21 486 -39 53 -71 69 -134 69 -63 0 -95 -16 -134 -69 -20 -26 -21 -42 -24 -377 l-3 -349 -1279 0 -1280 0 0 1920 0 1920 1280 0 1279 0 3 -349 c3 -335 4 -351 24 -377 39 -53 71 -69 134 -69 63 0 95 16 134 69 21 27 21 38 21 486 0 448 0 459 -21 486 -11 15 -33 37 -48 48 -27 21 -30 21 -1514 23 -1221 2 -1492 0 -1517 -11z" />
                                <path
                                    d="M3140 3349 c-30 -12 -705 -683 -726 -721 -18 -35 -18 -101 0 -136 8 -15 171 -183 363 -374 376 -375 370 -370 460 -353 49 9 109 69 118 118 16 85 9 96 -208 314 l-201 203 876 2 c868 3 877 3 904 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -36 21 -904 24 l-876 2 201 203 c216 217 224 229 209 312 -17 91 -127 149 -216 114z" />
                            </g>
                        </svg>

                    </div>
                </div>
            </a>
        </div>
    </div>
    <main class="ContainerGeneral contenedor sombra">
        <div>
            <?php
            include '../Config/Conexion.php';
            session_start();
            if (isset($_POST["buscarDatos"])) {
                if (empty($_POST["Identificacionn"])) {
                    echo "<script>alert('NO SE PUEDE DEJAR VACIO CAMPO N.I')</script>";
                    echo "<script>location.href='acudiente.php'</script>";
                } else {
                    $Documento = $_POST["Identificacionn"];
                    $query = "SELECT * FROM observador WHERE Numero_Documento = '$Documento'";
                    $resultado = mysqli_query($conexion, $query);
                    if (mysqli_num_rows($resultado) > 0) {
                        echo "<script>alert('USUARIO CORRECTO')</script>";
                        $_SESSION['id_usuario'] = $_POST['Identificacionn'];
                    } else {
                        echo "<script>alert('ID NO ENCONTRADO')</script>";
                        echo "<script>location.href='acudiente.php'</script>";
                    }
                }
            }
            $Identificacion = $_SESSION['id_usuario'];
            $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre_Estudiante, ' ', o.Apellido_Estudiante) AS NombreCompleto, o.*, c.Nom_Curso, i.Nombre_Imagen
                    FROM observador o
                    LEFT JOIN imagenes i ON o.Id_Imagen = i.Id_Imagen
                    LEFT JOIN curso c ON o.Id_Curso = c.Id_Curso WHERE o.Numero_Documento='$Identificacion'") or die("ERROR AL TRAER LOS DATOS");
            while ($extraido = mysqli_fetch_array($consultar)) {
                $Id_Est = $extraido['Id_Estudiante'];
                echo '<div class="usuario__especifico">       
                <h3 id="DataUser">Perfil</h3>
                <div class="imagen">
                <img width="100" src="../Assets/Photos_Students/' . $extraido['Nombre_Imagen'] . '">
                </div> 
                <h3 id="DataUser">DATOS DEL ESTUADIANTE</h3>
                <div class="usuario__campo">
                    <label>Nombre:</label>
                    <input readonly class="Input_Text" type="text"  value="' . $extraido['NombreCompleto'] . '">
                </div>
                <div class="usuario__campo">
                    <label>N.I:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['Numero_Documento'] . '">
                </div>
                <div class="usuario__campo">
                    <label>Curso:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['Nom_Curso'] . '">
                </div>
            </div>';
                $consultar2 = mysqli_query($conexion, "select * from anotacion WHERE Id_Estudiante='$Id_Est'") or die("ERROR AL TRAER LOS DATOS");
                $query = "SELECT COUNT(*) AS total FROM anotacion WHERE Id_Estudiante='$Id_Est'";
                $resultado = mysqli_query($conexion, $query);
                $datos = mysqli_fetch_assoc($resultado);
                $totalFilas = $datos['total'];
                echo '<div class="anotaciones">
                <h1 id="TitleStart">ANOTACIONES</h1>
                <div class="formulario">
                        <div class="Container1">
                        <label>Resultados Obtenidos: (' . $totalFilas . ')</label>';
                while ($extraido = mysqli_fetch_array($consultar2)) {
                    echo '
                           <div class="DatosUsuario">
                                <div>
                                    <label>T.FALTA</label>
                                    <input readonly class="Input_Text" type="text" placeholder="Tipo de falta" value="' . $extraido['Tipo_Falta'] . '">
                                </div>
                                <div>
                                    <label>FECHA</label>
                                    <input  readonly class="Input_Text" type="text" placeholder="Fecha" value="' . $extraido['Fecha_Creacion'] . '">
                                </div>
                                <div class="img_margen">   
                                        <div class="color__img">
                                        <style>
                                        .custom-button {
                                        background: none;
                                        border: none;
                                          padding: 0;
                                          cursor: pointer;
                                         }
                                        </style>
                                        <form action="descripcion_anotacion.php" method="post">   
                                            <input type="hidden" name="NumeroVer" value="' . $extraido['Id_Anotacion'] . '">       
                                              <button name="VerAnotacion" type="submit" class="img_margen custom-button">
                                                  <div class="img_margen">                                     
                                                     <div class="color__img">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-right-filled" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                         <path d="M12.089 3.634a2 2 0 0 0 -1.089 1.78l-.001 2.586h-6.999a2 2 0 0 0 -2 2v4l.005 .15a2 2 0 0 0 1.995 1.85l6.999 -.001l.001 2.587a2 2 0 0 0 3.414 1.414l6.586 -6.586a2 2 0 0 0 0 -2.828l-6.586 -6.586a2 2 0 0 0 -2.18 -.434l-.145 .068z" stroke-width="0" fill="currentColor" />
                                                          </svg>
                                                     </div> 
                                               </div>                                           
                                               </button>
                                             </form>   
                                        </div>                            
                                </div>                   
                        </div>';
                }
                echo '
                </div>';
            }
            ?>
        </div>
        </div>
    </main>
</body>

</html>