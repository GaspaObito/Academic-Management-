<?php include("../Template/CabeceraAnot.php"); ?>
<main class="ContainerGeneral">
    <div class="ContainerUser">
        <div class="usuario__especifico">
            <?php
            include '../Config/Conexion.php';
            if (isset($_POST['Id_Est'])) {
                $Id_Est = $_POST['Id_Est'];
                $_SESSION['Id_Session'] = $Id_Est;
            }
            $Id_Est = $_SESSION['Id_Session'];
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
                echo ' <label>Nombre:</label>
                            <div>';
                echo ' <input type="hidden" name="Id_Est" value="' . $_SESSION['Id_Session'] . '">';
                echo '<input readonly class="Input_Text" type="text" value="' . $extraido['NombreCompleto'] . '">
                            </div>
                        </div>
                        <div class="usuario__campo">
                            <label>N.I:</label>
                            <div>';
                echo '<input readonly class="Input_Text" type="text" value="' . $extraido['Numero_Documento'] . '">
                            </div>
                        </div>
                        <div class="usuario__campo">
                            <label>Curso:</label>
                            <div>';
                echo '<input readonly class="Input_Text" type="text" value="' . $extraido['Nom_Curso'] . '">
                            </div>
                        </div>';
            }
            ?>
        </div>
        <div class="anotaciones">
            <div class="nav__miniventana">
                <a></a>
                <h1 id="TitleStart">ANOTACIONES</h1>
                <div><a href="anotaciones.php">
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
            $consultar2 = mysqli_query($conexion, "select * from anotacion WHERE Id_Estudiante='$Id_Est'") or die("ERROR AL TRAER LOS DATOS");
            echo '<div class="formulario">                    
                            <div class="Container1" style="height: 52rem;">';
            $query = "SELECT COUNT(*) AS total FROM anotacion WHERE Id_Estudiante='$Id_Est'";
            $resultado = mysqli_query($conexion, $query);
            $datos = mysqli_fetch_assoc($resultado);
            $totalFilas = $datos['total'];
            echo '<label>Resultados Obtenidos: (' . $totalFilas . ')</label>';
            $contador = 1;
            while ($extraido = mysqli_fetch_array($consultar2)) {
                echo '<div class="DatosUsuario">
                                <label>Anot</label>
                                <input readonly class="Input_Text Input_Text--BgNone" style="width:50px;" type="text" placeholder="Tipo de falta" value="'.$contador++.'">
                                <label>T.Falta</label>
                                <input readonly class="Input_Text Input_Text--BgNone" type="text" placeholder="Tipo de falta" value="' . $extraido['Tipo_Falta'] . '">
                                <label>F.Creada</label>
                                <input readonly class="Input_Text Input_Text--BgNone" type="text" placeholder="Fecha" value="' . $extraido['Fecha_Creacion'] . '">
                                <label>F.Modificada</label>
                                <input readonly class="Input_Text Input_Text--BgNone" type="text" placeholder="Fecha" value="' . $extraido['Fecha_Modificacion'] . '">
                            <form action="historial_anotaciones.php" method="post">       
                                <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Anotacion'] . '">
                                <button name="EliminarDato" type="submit" class="img_margen custom-button">
                                    <svg class="navbar-icon">
                                        <use xlink:href="../Assets/Svg/Trash.svg#Trash-icon">
                                    </svg> 
                                </button>
                            </form>                                  
                            <form action="descripcion_anotacion.php" method="post">   
                                <input type="hidden" name="NumeroModificar" value="' . $extraido['Id_Anotacion'] . '">       
                                <input type="hidden" name="NumeroInsertar" value="' . $Id_Est . '">
                                <button name="InsertarAnotacion" type="submit" class="img_margen custom-button">
                                    <svg class="navbar-icon">
                                        <use xlink:href="../Assets/Svg/Arrow.svg#Arrow-icon">
                                    </svg>                                 
                                </button>
                            </form>   
                        </div>';
            }
            echo '</div>
                </div>';
            if (isset($_POST["EliminarDato"])) {
                $NumeroEliminar = $_POST['NumeroEliminar'];
                echo '<script>
                            var numeroEliminar = "' . $NumeroEliminar . '";
                            if (confirm("¿Estás seguro de que deseas eliminar los datos?")) {
                                // Redirigir al servidor para eliminar los datos
                                location.href = "../Config/Ft_Eliminar_Anota.php?NumeroEliminar=" + numeroEliminar;
                            } else {
                                // Cancelar la eliminación, redirigir a otra página o realizar acciones adicionales
                                alert("Eliminación cancelada");
                                location.href = "historial_anotaciones.php";
                            }
                        </script>';
            }
            ?>
        </div>
    </div>
</main>
<?php include("../Template/FooterProfe2.php"); ?>