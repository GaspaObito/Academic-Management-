<?php
/* PAGINA WEB */
$servidor = "Localhost";
$usuario = "root";
$clave = "";
$bddatos = "proyectoquintosemestre";
$conexion = mysqli_connect($servidor, $usuario, $clave, $bddatos)
        or die("ERROR DE CONEXION");
?>