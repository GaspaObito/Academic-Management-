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
            <?php
            include '../Config/Conexion.php';
            if (isset($_POST["buscarDatos"])) {
                $Id_Profe = $_POST['Identificacionn'];
                $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre, ' ', o.Apellido) AS NombreCompleto, o.*, c.Nom_Curso
                                      FROM profesor o  LEFT JOIN curso c ON o.Id_Profesor = c.Id_Profesor WHERE o.Id_Profesor='$Id_Profe'") or die("ERROR AL TRAER LOS DATOS");
                echo '<div class="Container1">';
                while ($extraido = mysqli_fetch_array($consultar)) {
                    echo '
                    <div class="DatosUsuario">
                        <label>I.D</label>
                            <input readonly class="Input_Text Input_Text--BgNone" style="width:50px;" type="text" value="' . $extraido['Id_Profesor'] . '">
                        <label>Nombre</label>
                            <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['NombreCompleto'] . '">   
                        <label>Asignado</label>
                            <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Asignatura'] . '">             
                        <label>CURSO</label>
                            <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Nom_Curso'] . '">                               
                                        <form action="anotaciones_busc.php" method="post">                      
                                         <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Profesor'] . '">
                                         <button name="EliminarDato" type="submit" class="img_margen custom-button">
                                                <svg class="navbar-icon">
                                                    <use xlink:href="../Assets/Svg/Trash.svg#Trash-icon">
                                                </svg>
                                            </button>
                                        </form>
                                       <form action="actualizar_profesor.php" method="post">   
                                         <input type="hidden" name="NumeroModificar" value="' . $extraido['Id_Profesor'] . '">
                                         <button name="InsertarAnotacion" type="submit" class="img_margen custom-button">
                                            <svg class="navbar-icon">
                                             <use xlink:href="../Assets/Svg/Arrow.svg#Arrow-icon">
                                            </svg>                                         
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
                    echo '<div class="DatosUsuario">
                        <label>I.D</label>
                            <input readonly class="Input_Text Input_Text--BgNone" style="width:50px;" type="text" value="' . $extraido['Id_Profesor'] . '">
                        <label>Nombre</label>
                            <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['NombreCompleto'] . '">   
                        <label>Asignado</label>
                            <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Asignatura'] . '">             
                        <label>CURSO</label>
                            <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Nom_Curso'] . '">
                                    <form action="Profesor_busc_Admin.php" method="post">       
                                        <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Profesor'] . '">
                                        <button name="EliminarDato" type="submit" class="img_margen custom-button">
                                            <svg class="navbar-icon">
                                                <use xlink:href="../Assets/Svg/Trash.svg#Trash-icon">
                                            </svg>
                                        </button>
                                    </form>                                  
                                   <form action="actualizar_profesor.php" method="post">   
                                     <input type="hidden" name="NumeroModificar" value="' . $extraido['Id_Profesor'] . '">
                                        <button name="InsertarAnotacion" type="submit" class="img_margen custom-button">
                                                <svg class="navbar-icon">
                                                    <use xlink:href="../Assets/Svg/Arrow.svg#Arrow-icon">
                                                </svg>                                
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
            } ?>
        </div>
        <div class="alinear-boton">
            <a href="../Formulario/R_profesor.php"> <button class="boton" type="submit" name="buscarDatos">AÑADIR PROFESOR</button></a>
        </div>
    </div>
    </div>
    </div>
</main>
<?php include("../Template/FooterProfe2.php"); ?>