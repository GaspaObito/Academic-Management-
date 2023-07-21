<?php
include("../Conexion.php");
session_start();
/* Inicio Sesion */
if (isset($_POST["button_Auth"])) {
    $Correo = $_POST['Correo'];
    $Contrasena = $_POST['Contrasena'];
    $sentencia = $conexion->prepare("SELECT * FROM profesor WHERE Email=?");
    $sentencia->bind_param('s', $Correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    if ($fila = $resultado->fetch_assoc()) {
        if ($fila['Email'] == 'Admin@Admin.com' && password_verify($Contrasena, $fila['Contrasena'])) {
            $_SESSION['Id_usuario'] = $fila['Id_Profesor'];
            $_SESSION['Id_Admin'] = $fila['Id_Profesor'];
            echo "<script>alert('USUARIO ADMINISTRADOR CORRECTO')</script>";
            echo "<script>location.href='../../Admin/Profesor_busc_Admin.php'</script>";
        } elseif (password_verify($Contrasena, $fila['Contrasena'])) {
            $_SESSION['Id_usuario'] = $fila['Id_Profesor'];
            echo "<script>alert('USUARIO PROFESOR CORRECTO')</script>";
            echo "<script>location.href='../../Profesor/anotaciones_busc.php'</script>";
        } else {
            echo "<script>alert('USUARIO O CONTRASEÑA INCORRECTA')</script>";
            echo "<script>location.href='../../Login_Users/profesor_y_admin.php'</script>";
        }
    } else {
        echo "<script>alert('USUARIO NO ENCONTRADO')</script>";
        echo "<script>location.href='../../Login_Users/profesor_y_admin.php'</script>";
    }
    $sentencia->close();
    $conexion->close();
}
if (isset($_POST["Cerrar_Login"])) {
    session_destroy();
    echo "<script>alert('SESION CERRADA')</script>";
    echo "<script>location.href='../../Login_Users/profesor_y_admin.php'</script>";
}