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
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="40" height="40"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12l10 0"></path>
                                    <path d="M10 12l4 4"></path>
                                    <path d="M10 12l4 -4"></path>
                                    <path d="M4 4l0 16"></path>
                                </svg>
                            </div>
                        </div>
                    </a></div>
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

                echo '      <div class="DatosUsuario">
                                   <div class="nombre">
                                        <label>ANOTACIÓN ' . $contador++ . '</label>
                                    </div>
                                    <div>
                                        <label>T.FALTA</label>
                                        <input readonly class="Input_Text" type="text" placeholder="Tipo de falta" value="' . $extraido['Tipo_Falta'] . '">
                                    </div>
                                    <div>
                                        <label>FECHA</label>
                                        <input readonly class="Input_Text" type="text" placeholder="Fecha" value="' . $extraido['Fecha_Creacion'] . '">
                                    </div>
                                    <style>
                                    .custom-button {
                                    background: none;
                                    border: none;
                                      padding: 0;
                                      cursor: pointer;
                                     }
                                    </style>
                                    <form action="historial_anotaciones.php" method="post">       
                                     <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Anotacion'] . '">
                                     <button name="EliminarDato" type="submit" class="img_margen custom-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </form>                                  
                                   <form action="descripcion_anotacion.php" method="post">   
                                   <input type="hidden" name="NumeroModificar" value="' . $extraido['Id_Anotacion'] . '">       
                                     <input type="hidden" name="NumeroInsertar" value="' . $Id_Est . '">
                                     <button name="InsertarAnotacion" type="submit" class="img_margen custom-button">
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