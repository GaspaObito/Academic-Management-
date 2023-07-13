<?php include("../Template/CabeceraAnot.php"); ?>
<main class="ContainerGeneral" style="max-height: 180rem;">
    <div class="nav__miniventana">
        <a></a>
        <h1 id="TitleStart">HISTORIAL DE ACCIONES</h1>
        <div>
            <a href="../Profesor/anotaciones_busc.php">
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
        include 'Conexion.php';
        $consultar = mysqli_query($conexion, "SELECT Numero_Documento, h.*, o.Numero_Documento
        FROM historial_operaciones h
        LEFT JOIN observador o ON h.Id_Estudiante = o.Id_Estudiante") or die("ERROR AL TRAER LOS DATOS");
        $query = "SELECT COUNT(*) AS total FROM historial_operaciones";
        $resultado = mysqli_query($conexion, $query);
        $datos = mysqli_fetch_assoc($resultado);
        $totalFilas = $datos['total'];
        echo '
        <div class="Container1" style="height: 80rem;">
            <div><label>Resultados Obtenidos: (' . $totalFilas . ')</label></div>
            <table class="Custom_Table">
                <thead>
                    <tr>
                        <th>Nombre_Usuario</th>
                        <th>Id_Anota</th>
                        <th>N.I Estudiante</th>
                        <th>Falta_Anterior</th>
                        <th>Fecha_Modificacion</th>
                        <th>Tipo_cambio</th>
                        <th>Descripcion_Anterior</th>
                    </tr>
                </thead>';
                /* TITULO DE LAS COLUMNAS */
                /* CUERPO DE LA TABLA */
                echo '<tbody>';
                    while ($extraido = mysqli_fetch_array($consultar)) {
                    echo'
                    <tr>
                        <td>' . $extraido['Nombre_Profesor'] . '</td>
                        <td>' . $extraido['Id_Anotacion'] . '</td>
                        <td>' . $extraido['Numero_Documento'] . '</td>
                        <td>' . $extraido['TipoFalta_Anterior'] . '</td>
                        <td>' . $extraido['Fecha_Modificacion'] . '</td>
                        <td>' . $extraido['Tipo_cambio'] . '</td>
                        <td class="descripcion-anterior" >' . $extraido['Descripcion_Anterior'] . '</td>
                    </tr>';
                    }
                echo '</tbody>
            </table>
            </div>';
        ?>
</main>
<?php include("../Template/FooterProfe2.php");