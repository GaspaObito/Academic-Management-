<?php
/* PAGINA WEB */
include("Conexion.php");
session_start();
/* R_OBSERVADOR_ESTUDIANTE */
if (isset($_POST["EnviarFormulario"])) {
    /*ACUDIENTE*/
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $parentesco = $_POST["parentesco"];
    $ocupacion = $_POST["ocupacion"];
    $telefono = $_POST["telefono"];
    $ViveAcudiente = $_POST["ViveAcudiente"];
    $email = $_POST["email"];
    $sql_detalle = "INSERT INTO datos_familiar(Nombre_Acudiente,Apellido_Acudiente,Parentesco,Ocupacion,Tel_Cel,Email,Vive_Con_Estudiante) VALUES(
    '" . $nombre . "','" . $apellido . "','" . $parentesco . "','" . $ocupacion . "','" . $telefono . "','" . $email . "','" . $ViveAcudiente . "')";
    /* Insertar datos en la tabla */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    /* Obtener el último ID insertado */
    $ultimoId_DatosFamiliar = mysqli_insert_id($conexion);
    /*FINALIZA ACUDIENTE*/
    /*HISTORIAL_ESCOLAR*/
    $Colegio_Anterior = $_POST["Colegio_Anterior"];
    $Direccion = $_POST["Direccion"];
    $Ult_Curso_Cursado = $_POST["Ult_Curso_Cursado"];
    $Jornada = $_POST["Jornada"];
    $Es_Repitente = $_POST["Es_Repitente"];
    $CuantasVeces = $_POST["CuantasVeces"];
    $PracticaDeporte = $_POST["PracticaDeporte"];
    $Nombre_Deporte = $_POST["Nombre_Deporte"];
    $sql_detalle = "INSERT INTO historial_escolar(Colegio_Anterior,Direccion,Curso,Jornada,Repitente,Cantidad_Repitente,Practica_Deporte,Nombre_Deporte) VALUES(
    '" . $Colegio_Anterior . "','" . $Direccion . "','" . $Ult_Curso_Cursado . "','" . $Jornada . "','" . $Es_Repitente . "','" . $CuantasVeces . "','" . $PracticaDeporte . "','" . $Nombre_Deporte . "')";
    /* Insertar datos en la tabla */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    /* Obtener el último ID insertado */
    $ultimoId_HistorialEscolar = mysqli_insert_id($conexion);
    /*FINALIZA HISTORIAL_ESCOLAR*/
    /*MEDICOS*/
    $Eps = $_POST["Eps"];
    $Sanitaria = $_POST["Sanitaria"];
    $Ocupación = $_POST["Ocupación"];
    $Recomendaciones = $_POST["Recomendaciones"];
    $Antecendentes = $_POST["Antecendentes"];
    $FornTipoSangre = $_POST["FornTipoSangre"];
    $sql_detalle = "INSERT INTO info_medica(Nombre_EPS,Prioridad_Sanitaria,Ocupacion,Recomendaciones_Medicas,Antecedentes_Medicos,Id_Tipo_Sangre) VALUES(
    '" . $Eps . "','" . $Sanitaria . "','" . $Ocupación . "','" . $Recomendaciones . "','" . $Antecendentes . "','" . $FornTipoSangre . "')";
    /* Insertar datos en la tabla */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    /* Obtener el último ID insertado */
    $ultimoId_InfoMedica = mysqli_insert_id($conexion);
    /*FINALIZA MEDICOS*/
    /*ESTUDIANTE*/
    $Nombre_Est = $_POST["Nombre_Est"];
    $Apellido_Est = $_POST["Apellido_Est"];
    $Telefono_Est = $_POST["Telefono_Est"];
    $Fecha_Nacimiento_Est = $_POST["Fecha_Nacimiento_Est"];
    $Direccion_Est = $_POST["Direccion_Est"];
    $Lugar_Nacimiento_Est = $_POST["Lugar_Nacimiento_Est"];
    $NumeroIdentif_Est = $_POST["NumeroIdentif_Est"];
    $FornCurso = $_POST["FornCurso"];
    $Edad_Est = $_POST["Edad_Est"];
    //RECIBIMOS POST IMAGEN 
    $TipoImagen = $_FILES['Imagen']['type'];
    $NombreImagen = "Estudiante_" . $_FILES['Imagen']['name'];
    $TamañoImagen = $_FILES['Imagen']['size'];
    $Imagen_temporal = $_FILES['Imagen']['tmp_name'];
    // Leer el contenido binario de la imagen
    $BinarioImagen = file_get_contents($Imagen_temporal);
    // Mover la imagen a la carpeta de destino
    move_uploaded_file($Imagen_temporal, "../Assets/Photos_Students/$NombreImagen");
    // Insertar en la base de datos
    $sql_TbImagen = "INSERT INTO imagenes (Nombre_Imagen, imagen) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql_TbImagen);
    $stmt->bind_param('ss', $NombreImagen, $BinarioImagen);
    $stmt->execute();
    $stmt->close();
    /* Obtener el último ID insertado */
    $ultimoId_Imagen = mysqli_insert_id($conexion);

    $sql_detalle = "INSERT INTO observador(Nombre_Estudiante,Id_Imagen,Apellido_Estudiante,Numero_Documento,Id_DatosFamiliar,Id_Historial_Escolar,Id_Medicina,Id_Curso,Tel_Cel,Fecha_Nacimiento,LugarNacimiento,Direccion,Edad) VALUES(
    '" . $Nombre_Est . "','" . $ultimoId_Imagen . "','" . $Apellido_Est . "','" . $NumeroIdentif_Est . "','" . $ultimoId_DatosFamiliar . "','" . $ultimoId_HistorialEscolar . "','" . $ultimoId_InfoMedica . "','" . $FornCurso . "','" . $Telefono_Est . "','" . $Fecha_Nacimiento_Est . "','" . $Lugar_Nacimiento_Est . "','" . $Direccion_Est . "','" . $Edad_Est . "')";
    /* Insertar datos en la tabla */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    /*FINALIZA ESTUDIANTE*/
    mysqli_close($conexion);
    echo "(<script>alert('LOS REGISTROS SE INSERTARON CORRECTAMENTE')</script>)";
    echo "<script>location.href = '../Formulario/Formularios.php'</script>";
}
/* R_PROFESOR */
if (isset($_POST["Enviar2"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["Apellido"];
    $NumDocumento = $_POST["NumDocumento"];
    $Telefono = $_POST["Telefono"];
    $Fecha_Nacimiento = $_POST["Fecha_Nacimiento"];
    $AsignaturaAca = $_POST["AsignaturaAca"];
    $AsignaturaProfe = $_POST["AsignaturaProfe"];
    $Area = $_POST["Area"];
    $Correo = $_POST["Correo"];
    $Contrasena = $_POST["Contrasena"];
    //RECIBIMOS POST IMAGEN 
    $TipoImagen = $_FILES['Imagen']['type'];
    $NombreImagen = "Profesor_" . $_FILES['Imagen']['name'];
    $TamañoImagen = $_FILES['Imagen']['size'];
    $Imagen_temporal = $_FILES['Imagen']['tmp_name'];
    // Leer el contenido binario de la imagen
    $BinarioImagen = file_get_contents($Imagen_temporal);
    // Mover la imagen a la carpeta de destino
    move_uploaded_file($Imagen_temporal, "../Assets/Photos_Teacher/$NombreImagen");
    // Insertar en la base de datos
    $sql_TbImagen = "INSERT INTO imagenes (Nombre_Imagen, imagen) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql_TbImagen);
    $stmt->bind_param('ss', $NombreImagen, $BinarioImagen);
    $stmt->execute();
    $stmt->close();
    /* Obtener el último ID insertado */
    $ultimoId_Imagen = mysqli_insert_id($conexion);
    $hashedPass = password_hash($Contrasena, PASSWORD_DEFAULT);
    $sql_detalle = "INSERT INTO profesor (Id_Imagen,Nombre,Apellido,Numero_Documento,Telefono,Fecha_Nacimiento,Asignacion_Academica,Asignatura,Area,Email,Contrasena) VALUES(
    '" . $ultimoId_Imagen . "','" . $nombre . "','" . $apellido . "','" . $NumDocumento . "','" . $Telefono . "','" . $Fecha_Nacimiento . "','" . $AsignaturaAca . "','" . $AsignaturaProfe . "','" . $Area . "','" . $Correo . "','" . $hashedPass . "')";
    /* Validar insercion */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    mysqli_close($conexion);
    echo "(<script>alert('LOS REGISTROS SE INSERTARON CORRECTAMENTE')</script>)";
    echo "<script>location.href = '../Formulario/R_profesor.php'</script>";
}

/* R_ANOTACION */
if (isset($_POST["Enviar5"])) {
    $nombre = $_POST["Nom_Prof"];
    $idEstudiante = $_SESSION['Id_Session'];
    $tipoFalta = $_POST["tipoFalta"];
    $descripcion = $_POST["descripcion"];
    $sql_detalle = "INSERT INTO anotacion(Nombre_Profesor,Id_Estudiante,Tipo_Falta,Descripcion_Falta,Fecha_Creacion) VALUES(
        '" . addslashes($nombre) . "','" . addslashes($idEstudiante) . "','" . addslashes($tipoFalta) . "','" . addslashes($descripcion) . "',NOW())";

    /* Validar insercion */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    mysqli_close($conexion);
    echo "<script>alert('LA ANOTACION SE INSERTO CORRECTAMENTE')</script>";
    echo "<script>location.href = '../Profesor/anotaciones.php'</script>";
}
/* R_DESCRIP_ANOTACION */
if (isset($_POST["Enviar6"])) {
    $nombre = $_SESSION['NombreProfe'];
    $Id_Anota = $_POST["NumeroModificar"];
    $tipoFalta = $_POST["tipoFalta"];
    $descripcion = $_POST["descripcion"];
    $sql_detalle = "UPDATE anotacion SET Nombre_Profesor_Modif='" . $nombre . "',Tipo_Falta='" . $tipoFalta . "', Descripcion_Falta='" . $descripcion . "'
    , Fecha_Modificacion=NOW() WHERE Id_Anotacion=" . $Id_Anota;
    /* Validar insercion */
    $resultado = mysqli_query($conexion, $sql_detalle) or die
        ("ERROR EN LA INSERCION" . $Id_Persona);
    mysqli_close($conexion);
    echo "<script>alert('LOS REGISTROS SE INSERTARON CORRECTAMENTE')</script>";
    echo "<script>location.href = '../Profesor/historial_anotaciones.php'</script>";
}
?>