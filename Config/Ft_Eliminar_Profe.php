<?php
include("Conexion.php");
$NumeroEliminar = $_GET['NumeroEliminar'];
mysqli_query($conexion, "delete from profesor where Id_Profesor='$NumeroEliminar'") or die("<script>alert('ERROR AL ELIMINAR')</script>");
mysqli_close($conexion);
echo "<script>location.href='../Admin/Profesor_busc_Admin.php'</script>";
?>