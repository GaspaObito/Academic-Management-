<?php include("../Template/CabeceraAnot.php"); ?>
<main class="ContainerGeneral" style="max-height: 180rem;">
  <div class="nav__miniventana">
    <a></a>
    <h1 id="TitleStart">HISTORIAL DE ACCIONES</h1>
    <div>
      <a href="../Profesor/anotaciones_busc.php">
        <div class="botonAtras">
          <div class="margen__boton">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="40"
              height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
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
  <fieldset>
    <?php
    include 'Conexion.php';
    $consultar = mysqli_query($conexion, "SELECT Numero_Documento, h.*, o.Numero_Documento
    FROM historial_operaciones h
    LEFT JOIN observador o ON h.Id_Estudiante = o.Id_Estudiante") or die("ERROR AL TRAER LOS DATOS");
    $query = "SELECT COUNT(*) AS total FROM historial_operaciones";
    $resultado = mysqli_query($conexion, $query);
    $datos = mysqli_fetch_assoc($resultado);
    $totalFilas = $datos['total'];
    echo '<div class="Container1" style="height: 80rem;">
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
      echo '<tr>';
      echo '<td>' . $extraido['Nombre_Profesor'] . '</td>';
      echo '<td>' . $extraido['Id_Anotacion'] . '</td>';
      echo '<td>' . $extraido['Numero_Documento'] . '</td>';
      echo '<td>' . $extraido['TipoFalta_Anterior'] . '</td>';
      echo '<td>' . $extraido['Fecha_Modificacion'] . '</td>';
      echo '<td>' . $extraido['Tipo_cambio'] . '</td>';
      echo '<td class="descripcion-anterior" >' . $extraido['Descripcion_Anterior'] . '</td>';
      echo '</tr>';
    }
    echo '</tbody>
    </table>
  </div>';
    ?>
    </div>
  </fieldset>
</main>
<?php include("../Template/FooterProfe2.php"); ?>