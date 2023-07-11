<?php include("../Template/CabeceraAnot.php");
include '../Config/Conexion.php'; ?>
<main class="ContainerGeneral">
    <div class="ContainerUser">
        <?php
        $Id_usuario = $_SESSION['Id_usuario'];
        $consultar = mysqli_query($conexion, "SELECT CONCAT(Nombre, ' ', Apellido) AS NombreCompleto, p.*, i.Nombre_Imagen 
        FROM profesor p 
        LEFT JOIN imagenes i ON p.Id_Imagen = i.Id_Imagen WHERE Id_Profesor='$Id_usuario'") or die("ERROR AL TRAER LOS DATOS");
        while ($extraido = mysqli_fetch_array($consultar)) {
            $_SESSION['NombreProfe'] = $extraido['NombreCompleto'];
            echo '<div class="usuario__especifico">
            <h3 id="DataUser">Perfil</h3>
            <div class="imagen">
              <img width="100" src="../Assets/Photos_Teacher/' . $extraido['Nombre_Imagen'] . '">
            </div>           
            <h3 id="DataUser">DATOS DEL PROFESOR</h3>
            <div class="usuario__campo">
                <label>Nombre:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['NombreCompleto'] . '">
            </div>
            <div class="usuario__campo">
                <label>N.I:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['Numero_Documento'] . '">
            </div>
            <div class="usuario__campo">
                <label>Asignatura:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['Asignatura'] . '">
            </div>
            <div class="usuario__campo">
                <label>Email:</label>
                    <input readonly class="Input_Text" type="text" value="' . $extraido['Email'] . '">
            </div>
        </div>';
            $_SESSION['NombreProfe'] = $extraido['NombreCompleto'];
        }
        ?>
        <div class="anotaciones">
            <h1 id="TitleStart">ANOTACIONES</h1>
            <form action="anotaciones_busc.php" method="post">
                <fieldset>
                    <legend>Buscar Estudiante por N.I</legend>
                    <div class="Formulario_Campos1">
                        <div style="display:flex;">
                            <label for="N.I" style="padding: 10px 10px 10px 0;">N.I</label>
                            <input class="Input_Text" type="text" id="N.I" name="Identificacionn"
                                placeholder="N.I del estudiente">
                        </div>
                        <div class="alinear-boton">
                            <button class="boton" type="submit" name='buscarDatos'>BUSCAR ESTUDIANTE</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="alinear-boton">
                <a href="../Config/TriggerAnotacion.php"> <button class="boton" type="submit" name='buscarDatos'>VER HISTORIAL SERVIDOR</button></a>
            </div>
            <?php
            if (isset($_POST["buscarDatos"])) {
                $Identificacion = $_POST['Identificacionn'];
                $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre_Estudiante, ' ', o.Apellido_Estudiante) AS NombreCompleto, o.*, c.Nom_Curso
                                      FROM observador o
                                      LEFT JOIN curso c ON o.Id_Curso = c.Id_Curso WHERE o.Numero_Documento='$Identificacion'") or die("ERROR AL TRAER LOS DATOS");
                echo '<div class="Container1"> ';
                while ($extraido = mysqli_fetch_array($consultar)) {
                    echo '<div class="DatosUsuario">
                                <label>ID</label>
                                    <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Numero_Documento'] . '">
                                <label>Nombre</label>
                                    <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['NombreCompleto'] . '">
                                <label>CURSO</label>
                                    <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Nom_Curso'] . '">                    
                                <form action="anotaciones_busc.php" method="post">                      
                                    <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Estudiante'] . '">
                                      <button name="EliminarDato" type="submit" class="img_margen custom-button">
                                            <svg class="navbar-icon">
                                                 <use xlink:href="../Assets/Svg/Trash.svg#Trash-icon">
                                             </svg>  
                                        </button>
                                </form>
                                <form action="anotaciones.php" method="post">   
                                    <input type="hidden" name="NumeroInsertar" value="' . $extraido['Id_Estudiante'] . '">
                                    <button name="InsertarAnotacion" type="submit" class="img_margen custom-button">
                                        <svg class="navbar-icon">
                                            <use xlink:href="../Assets/Svg/Arrow.svg#Arrow-icon">
                                        </svg>                                             
                                    </button>
                                </form>     
                                </div>
                            </div>
                                <div class="alinear-boton">
                                    <a href="../Formulario/Formularios.php"> <button class="boton" type="submit" name="buscarDatos">AÑADIR ESTUDIANTE</button></a>
                                </div>
                            </div>';
                }
            } else {
                /* Utilizar Join para Ingresar el otro Campos de Curso */
                $consultar = mysqli_query($conexion, "SELECT CONCAT(o.Nombre_Estudiante, ' ', o.Apellido_Estudiante) AS NombreCompleto, o.*, c.Nom_Curso
                                      FROM observador o
                                      LEFT JOIN curso c ON o.Id_Curso = c.Id_Curso") or die("ERROR AL TRAER LOS DATOS");
                $query = "SELECT COUNT(*) AS total FROM observador";
                $resultado = mysqli_query($conexion, $query);
                $datos = mysqli_fetch_assoc($resultado);
                $totalFilas = $datos['total'];
                echo '                
                <div class="Container1">
                            <label>Resultados Obtenidos: (' . $totalFilas . ')</label>';
                while ($extraido = mysqli_fetch_array($consultar)) {
                    echo '<div class="DatosUsuario">
                                <label>ID</label>
                                    <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Numero_Documento'] . '">
                                <label>Nombre</label>
                                    <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['NombreCompleto'] . '">
                                <label>CURSO</label>
                                    <input readonly class="Input_Text Input_Text--BgNone" type="text" value="' . $extraido['Nom_Curso'] . '">                    
                                <form action="anotaciones_busc.php" method="post">       
                                    <input type="hidden" name="NumeroEliminar" value="' . $extraido['Id_Estudiante'] . '">
                                    <button name="EliminarDato" type="submit" class="img_margen custom-button">
                                        <svg class="navbar-icon">
                                           <use xlink:href="../Assets/Svg/Trash.svg#Trash-icon">
                                        </svg>  
                                    </button>
                                </form>                                  
                                <form action="anotaciones.php" method="post">   
                                 <input type="hidden" name="NumeroInsertar" value="' . $extraido['Id_Estudiante'] . '">
                                    <button name="InsertarAnotacion" type="submit" class="img_margen custom-button">                                                                       
                                        <svg class="navbar-icon">
                                            <use xlink:href="../Assets/Svg/Arrow.svg#Arrow-icon">
                                        </svg>                                                           
                                    </button>
                                </form>         
                            </div>';
                }
                echo '</div>    
                        <div class="alinear-boton">
                    <a href="../Formulario/Formularios.php"> <button class="boton" type="submit" name="buscarDatos">AÑADIR ESTUDIANTE</button></a>
                </div>';
            }
            if (isset($_POST["EliminarDato"])) {
                $NumeroEliminar = $_POST['NumeroEliminar'];
                echo '<script>
                        var numeroEliminar = "' . $NumeroEliminar . '";
                        if (confirm("¿Estás seguro de que deseas eliminar los datos?")) {
                            // Redirigir al servidor para eliminar los datos
                            location.href = "../Config/Ft_Eliminar.php?NumeroEliminar=" + numeroEliminar;

                        } else {
                            // Cancelar la eliminación, redirigir a otra página o realizar acciones adicionales
                            alert("Eliminación cancelada");
                            location.href = "anotaciones_busc.php";
                        }
                    </script>';
            }
            ?>
            </div>
        </div>
    </div>
</main>
<?php include("../Template/FooterProfe2.php"); ?>