<?php
include("Conexion.php");
$NumeroEliminar = $_GET['NumeroEliminar'];
mysqli_query($conexion, "delete from observador where Id_Estudiante='$NumeroEliminar'") or die("<script>alert('ERROR AL ELIMINAR')</script>");
mysqli_close($conexion);
echo "<script>location.href='../Profesor/anotaciones_busc.php'</script>";
?>