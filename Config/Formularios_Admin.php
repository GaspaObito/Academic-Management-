<?php
/* PAGINA WEB */
include("Conexion.php");
/* R_PROFESOR */
if (isset($_POST["Enviar2"])) {
    $Id_Profesor = $_POST['id_profesor'];
    $ultimoId_Imagen = $_POST['id_lastImg'];
    $Nombre = $_POST["nombre"];
    $Apellido = $_POST["Apellido"];
    $NumDocumento = $_POST["NumDocumento"];
    $Telefono = $_POST["Telefono"];
    $Fecha_Nacimiento = $_POST["Fecha_Nacimiento"];
    $AsignaturaAca = $_POST["AsignaturaAca"];
    $AsignaturaProfe = $_POST["AsignaturaProfe"];
    $Area = $_POST["Area"];
    $Correo = $_POST["Correo"];
    $Contrasena = $_POST["Contrasena"];
    //VALIDAMOS SI RECIBIO O NO IMAGEN
    if (!empty($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
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
    } else {
        $ultimoId_Imagen = $_POST['id_lastImg'];
    }
    $sentencia = $conexion->prepare("SELECT * FROM profesor WHERE Email=?");
    $sentencia->bind_param('s', $Correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    if ($fila = $resultado->fetch_assoc()) {
        if ($Contrasena == $fila['Contrasena']) {
            $hashedPass = $fila['Contrasena'];
        } else {
            $hashedPass = password_hash($Contrasena, PASSWORD_DEFAULT);
        }
    }
    // INSERTADOS DATOS DEL PROFESOR
    $sql_detalle = "CALL ActualizarProfesor($Id_Profesor,$ultimoId_Imagen,'$Nombre', '$Apellido','$NumDocumento','$Telefono', '$Fecha_Nacimiento', '$AsignaturaAca', '$AsignaturaProfe', '$Area', '$Correo', '$hashedPass')";

    /* Validar insercion */
    if ($conexion->query($sql_detalle) === TRUE) {
        echo "<script>alert('SE ACTUALIZO CORRECTAMENTE')</script>";
        echo "<script>location.href='../Admin/Profesor_busc_Admin.php'</script>";
    } else {
        echo "<script>alert('ERROR AL ACTUALIZAR EL PROFESOR')</script>";
        echo "<script>location.href='../Admin/Profesor_busc_Admin.php'</script>";
    }
    $conexion->close();
}
?>