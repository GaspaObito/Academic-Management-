<?php include("../Template/CabeceraAnot.php"); ?>
<main class="ContainerGeneral">
    <div class="ContainerUser">
        <div class="usuario__especifico">
            <?php
            include '../Config/Conexion.php';
            $Id_Est = $_POST['NumeroInsertar'];
            /* Utilizar Join para Ingresar el otro Campos de Curso */
            $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre_Estudiante, ' ', o.Apellido_Estudiante) AS NombreCompleto, o.*, c.Nom_Curso, i.Nombre_Imagen
                                      FROM observador o
                                      LEFT JOIN imagenes i ON o.Id_Imagen = i.Id_Imagen
                                      LEFT JOIN curso c ON o.Id_Curso = c.Id_Curso WHERE o.Id_Estudiante='$Id_Est'") or die("ERROR AL TRAER LOS DATOS");
            while ($extraido = mysqli_fetch_array($consultar)) {
                echo '
            <h3 id="DataUser">Perfil</h3>
                <div class="imagen">
                    <img width="100" src="../Assets/Photos_Students/' . $extraido['Nombre_Imagen'] . '">
                </div>  
            <h3 id="DataUser">DATOS DEL ESTUDIANTE</h3>
            <div class="usuario__campo">';
                $IdGeneral = $extraido['Id_Estudiante'];
                $NomGeneral = $extraido['NombreCompleto'];
                echo '<label>Nombre:</label>
                <div>
                    <input type="hidden" name="Id_Est" value="' . $extraido['Id_Estudiante'] . '">
                    <input readonly class="Input_Text" type="text" value="' . $extraido['NombreCompleto'] . '">
                </div>
            </div>
            <div class="usuario__campo">
                <label>N.I:</label>
                 <div>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['Numero_Documento'] . '">
                </div>
            </div>
            <div class="usuario__campo">
               <label>Curso:</label>
               <div>
               <input readonly class="Input_Text" type="text" value="' . $extraido['Nom_Curso'] . '">
               </div>
            </div>';
            }
            ?>
        </div>
        <div class="anotaciones">
            <style>
                .Actual {
                    background-color: yellow;
                }
            </style>
            <div class="nav__miniventana">
                <a></a>
                <h1 id="TitleStart">ANOTACIONES</h1>
                <div>
                    <a href="historial_anotaciones.php">
                        <div class="botonAtras">
                            <div class="margen__boton">
                                <svg class="navbar-icon" style="margin:0;">
                                    <use xlink:href="../Assets/Svg/Arrow_Back.svg#Arrow_Back-icon">
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            $Id_Anota = $_POST['NumeroModificar'];
            $consultar2 = mysqli_query($conexion, "select * from anotacion WHERE Id_Anotacion='$Id_Anota'") or die("ERROR AL TRAER LOS DATOS");
            echo ' <form action="../Config/Formularios_Todos.php" method="post" class="formulario">
                        <fieldset>';
            while ($extraido = mysqli_fetch_array($consultar2)) {
                echo '<div>
                                <div class="Add_Anotacion">
                                    <label>TIPO DE FALTA</label>';
                echo ' <input type="hidden" name="NumeroModificar" value="' . $Id_Anota . '">';
                echo '  <select name="tipoFalta"  class="Input_Text" required>
                                <option class="Actual" disabled selected>Actual ' . $extraido['Tipo_Falta'] . '</option>
                                <option>Leve</option>
                                <option>Grave</option>
                                <option>Muy grave</option>
                            </select>
                                   </div>
                                <div class="Add_Anotacion">
                                    <label>DESCRIPCION DE LA ANOTACIÓN</label>
                                    <textarea maxlength="255" class="Input_Text" name="descripcion" required >' . $extraido['Descripcion_Falta'] . '</textarea>
                                </div>
                                <div class="Add_Anotacion">
                                    <label>ANOTACION CREADA POR</label>
                                    <input readonly class="Input_Text" type="text" value="' . $extraido['Nombre_Profesor'] . '">
                                </div>
                                <div class="Add_Anotacion">
                                    <label>ULTIMA MODIFICACION REALIZADA POR</label>
                                    <input readonly class="Input_Text" type="text" value="' . $extraido['Nombre_Profesor_Modif'] . '">
                                </div>
                            </div> ';
            }
            echo '</fieldset>
                    <div class="alinear-boton">
                    <input class="boton" type="submit" name="Enviar6" value="ENVIAR ANOTACIÓN">                      
                </div>
                    </form>';
            ?>
        </div>
    </div>
</main>
<?php include("../Template/FooterProfe2.php"); ?>