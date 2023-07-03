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
            <a href="historial_anotaciones.php">
                <div class="botonAtras">
                    <div class="margen__boton">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left"
                            width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12l10 0"></path>
                            <path d="M10 12l4 4"></path>
                            <path d="M10 12l4 -4"></path>
                            <path d="M4 4l0 16"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <main class="ContainerGeneral contenedor sombra">
        <div>
            <?php
            session_start();
            include '../Config/Conexion.php';
            $Identificacion = $_SESSION['id_usuario'];
            $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre_Estudiante, ' ', o.Apellido_Estudiante) AS NombreCompleto, o.*, c.Nom_Curso, i.Nombre_Imagen
                    FROM observador o
                    LEFT JOIN imagenes i ON o.Id_Imagen = i.Id_Imagen
                    LEFT JOIN curso c ON o.Id_Curso = c.Id_Curso WHERE o.Numero_Documento='$Identificacion'") or die("ERROR AL TRAER LOS DATOS");
            while ($extraido = mysqli_fetch_array($consultar)) {
                echo '
            <div class="usuario__especifico">
                <h3 id="DataUser">Perfil</h3>
                <div class="imagen">
                <img width="100" src="../Assets/Photos_Students/' . $extraido['Nombre_Imagen'] . '">
                </div> 
            <h3 id="DataUser">DATOS DEL ESTUADIANTE</h3>
                <div class="usuario__campo"><label>Nombre:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['NombreCompleto'] . '">
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
            }
            ?>
            <div class="anotaciones">
                <h1 id="TitleStart">ANOTACIONES</h1>
                <?php
                $Id_Anota = $_POST['NumeroVer'];
                $consultar2 = mysqli_query($conexion, "select * from anotacion WHERE Id_Anotacion='$Id_Anota'") or die("ERROR AL TRAER LOS DATOS");
                echo ' <form class="formulario">
                        <fieldset>';
                while ($extraido = mysqli_fetch_array($consultar2)) {
                    echo '<div>
                                <div class="Add_Anotacion">
                                    <label>TIPO DE FALTA</label>
                                    <input readonly class="Input_Text" type="text" placeholder="TIPO DE FALTA" value="' . $extraido['Tipo_Falta'] . '">
                                </div>
                                <div class="Add_Anotacion">
                                    <label>DESCRIPCION DE LA ANOTACIÓN</label>
                                    <textarea readonly class="Input_Text" >' . $extraido['Descripcion_Falta'] . '</textarea>
                                </div>
                            </div>';
                }
                echo '    
                        </fieldset>
                    </form>';
                ?>
            </div>
        </div>
    </main>
</body>

</html>