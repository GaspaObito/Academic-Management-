<?php include("../Template/CabeceraAnot.php"); ?>
<main class="ContainerGeneral">
    <div>
        <div class="anotaciones">
            <h1 id="TitleStart">ACTUALIZAR PROFESOR</h1>
            <form action="Profesor_busc_Admin.php" method="post">
                <fieldset>
                    <legend>Buscar Docente por N.I</legend>
                    <div class="Formulario_Campos1">
                        <div style="display:flex;">
                            <label for="N.I" style="padding: 10px 10px 10px 0;">N.I</label>
                            <input class="Input_Text" type="text" id="N.I" name="Identificacionn"
                                placeholder="N.I del Docente">
                        </div>
                        <div class="alinear-boton">
                            <button class="boton" type="submit" name='buscarDatos'>BUSCAR DOCENTE</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <style>
                .Input_Text--BgNone {
                    box-shadow: none;
                    background: none;
                }
            </style>
            <?php
            include '../Config/Conexion.php';
            if (isset($_POST["buscarDatos"])) {
                $Id_Profe = $_POST['Identificacionn'];
                $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre, ' ', o.Apellido) AS NombreCompleto, o.*, c.Nom_Curso
                                      FROM profesor o  LEFT JOIN curso c ON o.Id_Profesor = c.Id_Profesor WHERE o.Id_Profesor='$Id_Profe'") or die("ERROR AL TRAER LOS DATOS");
                echo '
                            <div class="Container1">';
                while ($extraido = mysqli_fetch_array($consultar)) {
                    echo '<div class="DatosUsuario">';
                    echo '<div class="formulario__campo2">
                        <label>I.D</label>
                              <input readonly class="Input_Text Input_Text--BgNone" style="width: 30%;" type="text" value="' . $extraido['Id_Profesor'] . '">
                                    </div>';
                    echo '<input readonly class="Input_Text Input_Text--BgNone" style="width: 30%;" type="text" value="' . $extraido['NombreCompleto'] . '">
                                    <div class="formulario__campo2">
                                        <label>Asignado</label>';
                    echo '<input readonly class="Input_Text Input_Text--BgNone" style="width: 60%;" type="text" value="' . $extraido['Asignatura'] . '">
                                    </div>
                                    <div class="formulario__campo2">
                                        <label>CURSO</label>';
                    echo '<input readonly class="Input_Text Input_Text--BgNone" style="width: 60%;" type="text" value="' . $extraido['Nom_Curso'] . '">
                                    </div>
                                    <style>
                                    .custom-button {
                                    background: none;
                                    border: none;
                                      padding: 0;
                                      cursor: pointer;
                                     }
                                    </style>
                                    <form action="anotaciones_busc.php" method="post">                      
                                     <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Profesor'] . '">
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
                                   <form action="actualizar_profesor.php" method="post">   
                                     <input type="hidden" name="NumeroModificar" value="' . $extraido['Id_Profesor'] . '">
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
                echo ' </div>                                  
                                </div>';

            } else {
                /* Utilizar Join para Ingresar el otro Campos de Curso */
                $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre, ' ', o.Apellido) AS NombreCompleto, o.*, c.Nom_Curso
                    FROM profesor o
                    LEFT JOIN curso c ON o.Id_Profesor = c.Id_Profesor") or die("ERROR AL TRAER LOS DATOS");
                $query = "SELECT COUNT(*) AS total FROM profesor";
                $query = "SELECT COUNT(*) AS total FROM profesor";
                $resultado = mysqli_query($conexion, $query);
                $datos = mysqli_fetch_assoc($resultado);
                $totalFilas = $datos['total'];
                echo '   <div class="Container1">
                            <label>Resultados Obtenidos: (' . $totalFilas . ')</label>';
                while ($extraido = mysqli_fetch_array($consultar)) {
                    echo '<div class="DatosUsuario">';
                    echo '<div class="formulario__campo2">
                        <label>I.D</label>
                              <input readonly class="Input_Text Input_Text--BgNone" style="width: 30%;" type="text" value="' . $extraido['Id_Profesor'] . '">
                                    </div>';
                    echo '<input readonly class="Input_Text Input_Text--BgNone" style="width: 30%;" type="text" value="' . $extraido['NombreCompleto'] . '">
                                    <div class="formulario__campo2">
                                        <label>Asignado</label>';
                    echo '<input readonly class="Input_Text Input_Text--BgNone" style="width: 60%;" type="text" value="' . $extraido['Asignatura'] . '">
                                    </div>
                                    <div class="formulario__campo2">
                                        <label>CURSO</label>';
                    echo '<input readonly class="Input_Text Input_Text--BgNone" style="width: 60%;" type="text" value="' . $extraido['Nom_Curso'] . '">
                                    </div>
                                    <style>
                                    .custom-button {
                                    background: none;
                                    border: none;
                                      padding: 0;
                                      cursor: pointer;
                                     }
                                    </style>
                                    <form action="Profesor_busc_Admin.php" method="post">       
                                     <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Profesor'] . '">
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
                                   <form action="actualizar_profesor.php" method="post">   
                                     <input type="hidden" name="NumeroModificar" value="' . $extraido['Id_Profesor'] . '">
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
                                </div>  
                                ';
                }
            }
            if (isset($_POST["EliminarDato"])) {
                $NumeroEliminar = $_POST['NumeroEliminar'];
                echo '<script>
                        var numeroEliminar = "' . $NumeroEliminar . '";
                        if (confirm("¿Estás seguro de que deseas eliminar los datos?")) {
                            // Redirigir al servidor para eliminar los datos
                            location.href = "../Config/Ft_Eliminar_Profe.php?NumeroEliminar=" + numeroEliminar;

                        } else {
                            // Cancelar la eliminación, redirigir a otra página o realizar acciones adicionales
                            alert("Eliminación cancelada");
                            location.href = "Profesor_busc_Admin.php";
                        }
                    </script>';
            }
            ?>
        </div>
        <div class="alinear-boton">
            <a href="../Formulario/R_profesor.php"> <button class="boton" type="submit" name="buscarDatos">AÑADIR
                    PROFESOR</button></a>
        </div>
    </div>
    </div>

    </div>
</main>
<?php include("../Template/FooterProfe2.php"); ?>